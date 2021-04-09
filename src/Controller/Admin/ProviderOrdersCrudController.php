<?php

namespace App\Controller\Admin;

use App\Entity\Product;
use App\Entity\ProductProviderOrders;
use App\Entity\ProviderOrders;
use App\Form\ProviderOrdersType;
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
use Symfony\Component\HttpFoundation\Request;
use mysql_xdevapi\Collection;
use phpDocumentor\Reflection\Types\Object_;
use Symfony\Component\Form\ChoiceList\ChoiceList;
use Symfony\Component\Form\FormTypeInterface;
use Symfony\Component\Routing\Annotation\Route;


class ProviderOrdersCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ProviderOrders::class;
    }
    /**
     * @Route(path="/admin_74ze5f/product/new", name="product_new")
     */
    public function newProduct(Request $request)
    {
        $task = new ProviderOrders();
        $entityManager = $this->getDoctrine()->getManager();

        $form = $this->createForm(ProviderOrdersType::class, $task);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $dataForm = $request->request->get('provider_orders');
            $quantities = $dataForm['quantity'];
            $products = $form->get('products')->getData();

            $entityManager->persist($data);


            foreach($products as $key => $product) {
                $productProviderOrders = new ProductProviderOrders();
                $productProviderOrders->setQuantity($quantities[$product->getId()]);
                $productProviderOrders->setProduct($product);
                $entityManager->persist($productProviderOrders);
            }

            $entityManager->flush();

            return $this->redirectToRoute('admin', [
                'entity' => 'ProviderOrders',
                'crudAction' => 'index',
                'menuIndex' => 1,
                'crudControllerFqcn' => 'App\Controller\Admin\ProviderOrdersCrudController'
            ]);
        }

        return $this->render('product/new.html.twig', [
            'form' => $form->createView()
        ]);
    }
    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->update(Crud::PAGE_INDEX, Action::DELETE, function (Action $action) {
                return $action->setIcon('fa fa-trash')->setLabel(false);
            })
            ->update(Crud::PAGE_INDEX, Action::EDIT, function (Action $action) {
                return $action->setIcon('fa fa-pencil')->setLabel(false);})
            ->update(Crud::PAGE_INDEX, Action::NEW, function (Action $action) {
                return $action->setIcon('fa fa-pencil')->setLabel('Create')->linkToRoute('product_new');
            });
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            BooleanField::new('isPaid'),
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



}
