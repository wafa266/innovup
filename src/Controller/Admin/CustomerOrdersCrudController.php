<?php

namespace App\Controller\Admin;

use App\Entity\CustomerOrders;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CustomerOrdersCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return CustomerOrders::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
