<?php

namespace App\Controller\Admin;

use App\Entity\ProviderOrders;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;

class ProviderOrdersCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ProviderOrders::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            BooleanField::new('isPaid'),
            AssociationField::new('provider', 'Provider'),
            AssociationField::new('product', 'Products')
        ];
    }
}
