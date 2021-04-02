<?php

namespace App\Controller\Admin;

use App\Entity\Category;
use App\Entity\Product;
use Container9rgpAcZ\getCategoryCrudControllerService;
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
use Vich\UploaderBundle\Form\Type\VichFileType;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ProductCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Product::class;
    }


    public function configureActions(Actions $actions): Actions
    {
        $detailUser = Action::new('detailUser', 'Detail', 'fa fa-user')
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
        return [
            IdField::new('id')->onlyOnDetail(),
            TextField::new('name'),
            NumberField::new('price', "prix d'achat"),
            NumberField::new('priceExcludingTax', "prix hors tax"),
            NumberField::new('tva'),
            NumberField::new('priceTtc', 'prix vente'),
            AssociationField::new('category', 'categorie'),
            Field::new('imageFile')->setFormType(VichImageType::class)->onlyOnDetail(),
            ImageField::new('image')->setBasePath('uploads\images\products')
                ->setCustomOption('uploadDir', 'public\uploads\images\products'),
            DateTimeField::new('createdAt')->onlyOnDetail(),
            DateTimeField::new('UpdatedAt')->onlyOnDetail()
        ];
    }

}
