<?php

namespace App\Controller\Admin;

use App\Entity\CustomerOrders;
use App\Entity\CustomerOrdersQuantity;
use App\Entity\ProviderOrdersQuantity;
use App\Entity\ProviderOrders;
use App\Form\CustomerOrdersType;
use App\Form\ProviderOrdersType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\HttpFoundation\Request;
use function Sodium\add;
use App\Entity\Product;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use mysql_xdevapi\Collection;
use phpDocumentor\Reflection\Types\Object_;
use Symfony\Component\Form\ChoiceList\ChoiceList;
use Symfony\Component\Form\FormTypeInterface;
use Symfony\Component\Routing\Annotation\Route;

class CustomerOrdersCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return CustomerOrders::class;
    }
    /**
     * @Route(path="/admin_74ze5f/customerOrders/new", name="customer_orders_new")
     */
    public function newCustomer(Request $request)
    {
        $customerOrders = new CustomerOrders();
        $entityManager = $this->getDoctrine()->getManager();

        $form = $this->createForm(CustomerOrdersType::class, $customerOrders);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $dataForm = $request->request->get('customer_orders');
            $quantities = $dataForm['quantity'];
            $products = $form->get('products')->getData();

            $entityManager->persist($customerOrders);
            $entityManager->flush();

            foreach ($products as $key => $product) {
                $customerOrdersQuantity = new CustomerOrdersQuantity();
                $customerOrdersQuantity->setQuantity($quantities[$key]);
                $customerOrdersQuantity->setProduct($product);
                $customerOrdersQuantity->setCustomerOrders($customerOrders);
                $entityManager->persist($customerOrdersQuantity);
            }

            $entityManager->flush();

            return $this->redirectToRoute('admin', [
                'entity' => 'CustomerOrders',
                'crudAction' => 'index',
                'menuIndex' => 1,
                'crudControllerFqcn' => 'App\Controller\Admin\CustomerOrdersCrudController'
            ]);
        }

        return $this->render('customerOrders/new.html.twig', [
            'form' => $form->createView()
        ]);
    }
    public function configureActions(Actions $actions): Actions
    {
        return $actions
            // ...
            ->update(Crud::PAGE_INDEX, Action::DELETE, function (Action $action) {
                return $action->setIcon('fa fa-trash')->setLabel(false);
            })
            ->update(Crud::PAGE_INDEX, Action::EDIT, function (Action $action) {
                return $action->setIcon('fa fa-pencil')->setLabel(false);})

            // in PHP 7.4 and newer you can use arrow functions
            // ->update(Crud::PAGE_INDEX, Action::NEW,
            //     fn (Action $action) => $action->setIcon('fa fa-file-alt')->setLabel(false))

            ->update(Crud::PAGE_INDEX, Action::NEW, function (Action $action) {
                return $action->setIcon('fa fa-pencil')->setLabel('Create')->linkToRoute('customer_orders_new');});

    }

    public function configureFields(string $pageName): iterable
    {
        return [
            BooleanField::new('isPaid'),
            AssociationField::new('customer', 'Client'),
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
