<?php

namespace App\Controller\Admin;

use App\Entity\CustomerOrders;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use function Sodium\add;

class CustomerOrdersCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return CustomerOrders::class;
    }
    public function configureActions(Actions $actions): Actions
    {
        return $actions
            // ...
            ->update(Crud::PAGE_INDEX, Action::DELETE, function (Action $action) {
                return $action->setIcon('fa fa-trash')->setLabel(false);
            })
            ->update(Crud::PAGE_INDEX, Action::EDIT, function (Action $action) {
                return $action->setIcon('fa fa-pencil')->setLabel(false);});

            // in PHP 7.4 and newer you can use arrow functions
            // ->update(Crud::PAGE_INDEX, Action::NEW,
            //     fn (Action $action) => $action->setIcon('fa fa-file-alt')->setLabel(false))

    }

    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('customer', 'client'),
            NumberField::new('price'),




        ];
    }

}
