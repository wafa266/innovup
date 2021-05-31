<?php

namespace App\Controller\Admin;

use App\Entity\Product;
use App\Entity\ProviderOrdersQuantity;
use App\Entity\ProviderOrders;
use App\Form\ProviderOrdersType;
use App\Repository\ProviderOrdersRepository;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use http\Env\Response;
use Symfony\Component\HttpFoundation\Request;
use mysql_xdevapi\Collection;
use phpDocumentor\Reflection\Types\Object_;
use Symfony\Component\Form\ChoiceList\ChoiceList;
use Symfony\Component\Form\FormTypeInterface;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Bundle\SnappyBundle\Snappy\Response\PdfResponse;
use Knp\Snappy\Pdf;
use function Sodium\add;


class ProviderOrdersCrudController extends AbstractCrudController
{
    private $snappy;
    /**
     * @var ProviderOrdersRepository
     */
    private $repository;

    public function __construct(Pdf $snappy, ProviderOrdersRepository $repository)
    {;
        $this->snappy = $snappy;
        $this->repository = $repository;
    }
    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add('createdAt')

            ;
    }
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->overrideTemplate('crud/index', 'providerOrders/index.html.twig')
            ->overrideTemplate('crud/detail', 'providerOrders/detail.html.twig')
          ->setPageTitle('index','Provider Orders');

    }

    public static function getEntityFqcn(): string
    {
        return ProviderOrders::class;
    }
    /**
     * @Route(path="/admin_74ze5f/product/new", name="product_new")
     */
    public function newProduct(Request $request)
    {$providerOrders = new ProviderOrders();
        $entityManager = $this->getDoctrine()->getManager();
        $form = $this->createForm(ProviderOrdersType::class, $providerOrders);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $dataForm = $request->request->get('provider_orders');
            $quantities = $request->request->get('provider_quantities');
            $products = $form->get('products')->getData();

            $entityManager->persist($providerOrders);
            $entityManager->flush();


            foreach($products as $key => $product) {
                $providerOrdersQuantity = new ProviderOrdersQuantity();
                /** @var  $product Product */
                $restQuantity = $product->getQuantity() + $quantities[$product->getId()];

                $providerOrdersQuantity->setQuantity($quantities[$product->getId()]);
                $providerOrdersQuantity->setProduct($product);
                $providerOrdersQuantity->setProviderOrders($providerOrders);

                $product->setQuantity($restQuantity);

                $entityManager->persist($providerOrdersQuantity);
            }

            $entityManager->flush();

            return $this->redirectToRoute('product_orders_show', [
                'entity' => 'ProviderOrders',
                'crudAction' => 'index',
                'menuIndex' => 1,
                'crudControllerFqcn' => 'App\Controller\Admin\ProviderOrdersCrudController',
                'id' => $providerOrders->getId(),
            ]);
        }

        return $this->render('ProviderOrders/new.html.twig', [
            'form' => $form->createView()
        ]);
    }
    /**
     * @Route(path="/admin_74ze5f/provider/show/{id}", name="product_orders_show")
     */
    public function showProdiverOrders($id)
    {
        $productOrders = $this->repository->find($id);
        return $this->render('ProviderOrders/show.html.twig', [
            'productOrders' => $productOrders
        ]);
    }
    /**
     * @Route(path="/admin_74ze5f/provider/save", name="product_orders_save")
     */
    public function saveProviderOrders()
    {
        return $this->redirectToRoute('admin', [
            'entity' => 'ProviderOrders',
            'crudAction' => 'index',
            'menuIndex' => 1,
            'crudControllerFqcn' => 'App\Controller\Admin\ProviderOrdersCrudController',
        ]);
    }

    /**
     * @Route(path="/admin_74ze5f/providerOrders/pdf/{id}", name="product_orders_pdf")
     */
    public function pdfProviderOrders($id)
    {
        $productOrders = $this->repository->find($id);
        $html = $this->renderView('ProviderOrders/pdf.html.twig', [
            'productOrders' => $productOrders
        ]);

        return new PdfResponse(
            $this->snappy->getOutputFromHtml($html),
            'file'.$id.'.pdf'
        );
    }

    public function configureActions(Actions $actions): Actions
    {  $detailUser = Action::new(Crud::PAGE_DETAIL, '')
        ->setIcon('fa fa-eye')->linkToCrudAction('detail')
        ->setCssClass('btn btn-circle  btn-success');
        return $actions
            ->update(Crud::PAGE_INDEX, Action::DELETE, function (Action $action) {
                return $action->setIcon('fa fa-trash')->setLabel(false);
            })
            ->update(Crud::PAGE_INDEX, Action::EDIT, function (Action $action) {
                return $action->setIcon('fa fa-pencil')->setLabel(false)->setCssClass('btn btn-circle ');})
            ->update(Crud::PAGE_INDEX, Action::NEW, function (Action $action) {
                return $action->setIcon('fa fa-pencil')->setLabel('Create new order')->linkToRoute('product_new');
            })
        ->add(Crud::PAGE_INDEX, $detailUser);

    }

    public function configureFields(string $pageName): iterable
    {
        return [
            BooleanField::new('isPaid'),
            TextField::new('reference','reference'),
            AssociationField::new('provider', 'Provider'),
            AssociationField::new('products', 'Products')
                ->setCustomOption('autocomplete', true)
                ->setFormTypeOption('data-widget', 'select2')
                ->setFormTypeOptions(['multiple' => 'true'])
                 ->formatValue(function ($value, $entity) {
                     $nn = '';
                     foreach($entity->getProducts() as $product)
                     {
                         $nn .= $product->getName() . ',';
                     }
                    return $nn;
                }),
            DateTimeField::new('createdAt')->formatValue(function ($value, $entity) {
                return date('d/m/Y H:i:s', strtotime($value));
            }),
            DateTimeField::new('updatedAt')->onlyOnDetail(),

        ];
    }
    /*

 /**
  * @Route (path="/PVRECEPTION", name="pv_reception")

 public function ShowproviderOrders() :\Symfony\Component\HttpFoundation\Response
 {
     $this->renderView('ProviderOrders/PvReception.html.twig');
 }
*/

}
