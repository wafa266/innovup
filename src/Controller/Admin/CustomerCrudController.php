<?php

namespace App\Controller\Admin;

use App\Entity\Customer;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TelephoneField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CustomerCrudController extends AbstractCrudController
{ public function configureCrud(Crud $crud): Crud
{
    return $crud
        ->setPageTitle('index', 'Customers');
}
    public static function getEntityFqcn(): string
    {
        return Customer::class;
    }
    public function configureActions(Actions $actions): Actions
    {    $detailUser = Action::new('detailUser', '')
        ->linkToCrudAction(Crud::PAGE_DETAIL)->setIcon('fa fa-eye')
        ->addCssClass('btn btn-circle btn-success');
        return $actions
            // ...
            ->update(Crud::PAGE_INDEX, Action::DELETE, function (Action $action) {
                return $action->setIcon('fa fa-trash')->setLabel(false)->addCssClass('btn btn-circle btn btn-outline-danger');
            })
            ->update(Crud::PAGE_INDEX, Action::EDIT, function (Action $action) {
                return $action->setIcon('fa fa-pencil')->setLabel(false)->setCssClass('btn btn-circle btn-info');})
            // in PHP 7.4 and newer you can use arrow functions
            // ->update(Crud::PAGE_INDEX, Action::NEW,
            //     fn (Action $action) => $action->setIcon('fa fa-file-alt')->setLabel(false))
            ->add(Crud::PAGE_INDEX,$detailUser)
            ;
    }
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->onlyOnDetail(),
            TextField::new('firstName'),
            TextField::new('lastName'),
            EmailField::new('email'),
            TelephoneField::new('phone'),
            DateTimeField::new('createdAt')->onlyOnDetail(),
        ];
    }


}
