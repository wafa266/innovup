<?php

namespace App\Controller\Admin;

use App\Entity\ProviderOrdersProduct;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class ProviderOrdersProductCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ProviderOrdersProduct::class;
    }

    public function configureFields(string $pageName): iterable
    {
         return [
            IntegerField::new('quantity'),
            AssociationField::new('providerOrders', 'Fournisseur'),
            /*AssociationField::new('products', 'Produits')
                ->setCustomOption('autocomplete', true)
                ->setFormTypeOption('data-widget', 'select2')
                ->setFormTypeOptions(['multiple' => 'true'])
             ,*/

            DateTimeField::new('createdAt')->onlyOnDetail(),
            DateTimeField::new('updatedAt')->onlyOnDetail(),
        ];
    }
}
