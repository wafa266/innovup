<?php

namespace App\Controller\Admin;

use App\Entity\Product;
use App\Entity\ProviderOrdersProduct;
use App\Repository\ProductRepository;
use ContainerG0esfcz\getDoctrine_EnsureProductionSettingsCommandService;
use ContainerIcedloH\getProductRepositoryService;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping\Id;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use http\Env\Response;
use phpDocumentor\Reflection\Types\Collection;
use phpDocumentor\Reflection\Types\Object_;
use phpDocumentor\Reflection\Types\True_;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ProviderOrdersProductCrudController extends AbstractCrudController
{ public $product;

    public function __construct( ProductRepository $product)
    {
        $this->product=$product;
    }
    public static function getEntityFqcn(): string
    {
        return ProviderOrdersProduct::class;

    }

    public function configureFields(string $pageName): iterable
    {
         return [
            IntegerField::new('quantity'),
            AssociationField::new('providerOrders', 'Fournisseur'),
            /*ChoiceField::new('products', 'Produits')
                ->setCustomOption('autocomplete', true)
                ->setFormTypeOption('data-widget', 'select2')
                ->setFormTypeOptions(['multiple' => 'true'])
                ->addCssClass('field-select')
                ->setCustomOption('renderAsBadges', null)
                ->setCustomOption('renderExpanded', false)
                ->setCustomOption('allowMultipleChoices', true)
                ->setCustomOption('widget', null)
               ->setCustomOption('choices','bonjour'),
            DateTimeField::new('createdAt')->onlyOnDetail(),
            DateTimeField::new('updatedAt')->onlyOnDetail(),*/
            /* AssociationField::new('products')->setFormType(ChoiceType::class,[
                 'choices'  => [
                     'Maybe' => null,
                     'Yes' => true,
                     'No' => false,
                 ],
             ]) */

        ];
    }
}
