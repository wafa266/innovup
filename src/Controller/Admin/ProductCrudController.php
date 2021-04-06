<?php

namespace App\Controller\Admin;

use App\Entity\Category;
use App\Entity\Product;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use Symfony\Component\HttpFoundation\Response;
use Vich\UploaderBundle\Form\Type\VichFileType;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ProductCrudController extends AbstractCrudController
{

    public static function getEntityFqcn(): string
    {
        return Product::class;
    }
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle(Crud::PAGE_INDEX,'Liste de vos produits ')
            ->overrideTemplate('crud/index', 'bundles/EasyAdminBundle/page/crud_index.html.twig');

    }

    public function configureActions(Actions $actions): Actions
    {
        $detailUser = Action::new('detailUser', 'Detail', 'fa fa-cubes')
          ->linkToCrudAction(Crud::PAGE_DETAIL)
          ->addCssClass('btn btn-info');
        /*
        $removeUser = Action::new('removeUser', 'Supprimer', 'fa fa-trash')
            ->addCssClass('btn btn-danger')
            ->linkToRoute('remove_product', function(Product $product){
                return [
                    'id' => $product->getId()
                ];
            });
        $updateUser = Action::new('updateUser', 'Modifier', 'fa fa-pencil')
            ->addCssClass('btn btn-pencil')
            ->linkToRoute('update_product', function(Product $product){
                return [
                    'id' => $product->getId()
                ];
            });
        */

        return $actions
            ->update(Crud::PAGE_INDEX, Action::DELETE, function (Action $action) {
                return $action->setIcon('fa fa-trash')->setLabel(false);
            })
            ->update(Crud::PAGE_INDEX, Action::EDIT, function (Action $action) {
            return $action->setIcon('fa fa-pencil')->setLabel(false);
            })
            //->disable(Action::DELETE, Action::EDIT)
            ->add(Crud::PAGE_INDEX, $detailUser);
            //->add(Crud::PAGE_INDEX, $removeUser)
            //->add(Crud::PAGE_INDEX, $updateUser);
    }

    public function configureFields(string $pageName): iterable
    {


        $fields = [
            IdField::new('id')->onlyOnDetail(),
            TextField::new('barcode'),
            TextField::new('name')->setTemplatePath('bundles/EasyAdminBundle/page/field_custom.html.twig'),
            NumberField::new('price', "prix d'achat"),
            NumberField::new('priceExcludingTax', "prix hors tax"),
            NumberField::new('tva'),
            NumberField::new('priceTtc', 'prix vente'),
            NumberField::new('quantity', 'quantity'),
            AssociationField::new('category', 'categorie'),
            Field::new('imageFile')->setFormType(VichImageType::class)->onlyOnDetail(),
            ImageField::new('image')->setBasePath('uploads\images\products')
                ->setCustomOption('uploadDir', 'public\uploads\images\products'),

            DateTimeField::new('createdAt')->onlyOnDetail(),
            DateTimeField::new('UpdatedAt')->onlyOnDetail()
        ];

        return $fields;
    }

}
