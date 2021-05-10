<?php

namespace App\Controller\Admin;

use App\Entity\User;


use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;

use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;

use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Filter\ArrayFilter;
use EasyCorp\Bundle\EasyAdminBundle\Filter\ChoiceFilter;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TelephoneField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;

use App\Form\UserType;

use EasyCorp\Bundle\EasyAdminBundle\Filter\ComparisonFilter;
use EasyCorp\Bundle\EasyAdminBundle\Form\Filter\Type\ComparisonFilterType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;



class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->overrideTemplate('crud/index', 'user/index.html.twig')
            ->overrideTemplate('crud/detail', 'user/detail.html.twig')
            ->setPageTitle('index', 'Users');




    }
    public function configureFilters(Filters $filters): Filters
    {
        return $filters
           ->add('roles') ;
    }

    public function configureActions(Actions $actions): Actions
    {
        $detailProduct = Action::new('')
                    ->linkToCrudAction(Crud::PAGE_DETAIL)
          ->setIcon('fa fa-user')->setCssClass('btn btn-circle  btn-success');

        return $actions
            ->setPermission(Action::NEW, 'ROLE_ADMIN')
            ->setPermission(Action::DELETE, 'ROLE_ADMIN')
            ->setPermission(Action::EDIT, 'ROLE_ADMIN')
            ->setPermission(Action::DETAIL, 'ROLE_USER')
            ->update(Crud::PAGE_INDEX, Action::EDIT, function (Action $action) {
                return $action->setIcon('fa fa-pencil')->setLabel('')->setCssClass('btn btn-circle  btn-info');
            })
            ->update(Crud::PAGE_INDEX, Action::DELETE, function (Action $action) {
                return $action->setIcon('fa fa-trash')->setLabel('')->addCssClass('btn btn-circle btn btn-outline-danger');
            })

            //->disable(Action::DELETE, Action::EDIT)
            ->add(Crud::PAGE_INDEX, $detailProduct)
        ;



        //->add(Crud::PAGE_INDEX, $updateUser);
    }

            // in PHP 7.4 and newer you can use arrow functions
            // ->update(Crud::PAGE_INDEX, Action::NEW,
            //     fn (Action $action) => $action->setIcon('fa fa-file-alt')->setLabel(false))


    /**
     * @Route("/admin", name="app_profile")
     */
    public function Showprofile()
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();

        return $this->redirectToRoute('admin', [
            'user' => User::class,
            'entity' => 'User',
            'crudAction' => 'detail',
            'menuIndex' => 1,
            'entityId' => $user->getId(),
            'crudControllerFqcn' => 'App\Controller\Admin\UserCrudController',
        ]);
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->onlyOnDetail(),
           // Field::new('imageFile')->setFormType(VichImageType::class)->onlyOnDetail(),
           ImageField::new('image')->setBasePath('uploads\images\users')
               ->setCustomOption('uploadDir', 'public\uploads\images\users'),
            TextField::new('firstName'),
            TextField::new('lastName'),
            EmailField::new('email'),
            TelephoneField::new('phone'),
            TextField::new('password')->hideOnIndex(),
            ChoiceField::new('roles')->setChoices([
                'admin'=>'ROLE_ADMIN',
                'magasinier'=>'ROLE_MAG',
                'responsable achat'=>'ROLE_PURCHASING_MANAGER',
                'responsable de vente'=>'ROLE_SALES_MANAGER'
            ])->allowMultipleChoices('false')
            ,
            DateTimeField::new('createdAt')->onlyOnDetail(),
            


        ];
    }


}
