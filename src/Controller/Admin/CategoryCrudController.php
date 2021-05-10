<?php

namespace App\Controller\Admin;

use App\Entity\Category;
use App\Repository\ProductRepository;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TelephoneField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Flex\Event\UpdateEvent;

class CategoryCrudController extends AbstractCrudController
{
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Categories');
}
    public static function getEntityFqcn(): string
    {
        return Category::class;}

    public function configureActions(Actions $actions): Actions
    {
        $detailProduct = Action::new('')
            ->linkToCrudAction(Crud::PAGE_DETAIL)
            ->addCssClass('btn btn-circle btn-success')
            ->setLabel('')
        ->setIcon('fa fa-eye');
        return $actions
            // ...
            ->update(Crud::PAGE_INDEX, Action::DELETE, function (Action $action) {
                return $action->setCssClass('btn btn-circle btn btn-outline-danger')->setLabel('')->setIcon('fa fa-trash'); })

                ->update(Crud::PAGE_INDEX, Action::EDIT, function (Action $action) {
                   return $action->setLabel('')->setCssClass("btn btn-circle  btn-info")->setIcon('fa fa-pencil');

            })
            ->add(Crud::PAGE_INDEX, $detailProduct);



        // in PHP 7.4 and newer you can use arrow functions
            // ->update(Crud::PAGE_INDEX, Action::NEW,
            //     fn (Action $action) => $action->setIcon('fa fa-file-alt')->setLabel(false))
            ;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            //IdField::new('id'),
            TextField::new('Name'),
            DateTimeField::new('createdAt'),
            DateTimeField::new('updatedAt'),

        ];
    }



}
