<?php

namespace App\Controller\Admin;

use App\Entity\Category;
use App\Entity\Product;
use CodeItNow\BarcodeBundle\Utils\BarcodeGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Vich\UploaderBundle\Form\Type\VichFileType;
use Vich\UploaderBundle\Form\Type\VichImageType;
use EasyCorp\Bundle\EasyAdminBundle\Contracts\Filter\FilterInterface;
use function Sodium\add;

class ProductCrudController extends AbstractCrudController
{

    public static function getEntityFqcn(): string
    {
        return Product::class;
    }
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->overrideTemplate('crud/index', 'product/index.html.twig')
            ->setPageTitle('index', 'Products');







        //;
            ;



    }

    public function configureActions(Actions $actions): Actions
    {
        $detailUser = Action::new('detailUser', '')
          ->linkToCrudAction(Crud::PAGE_DETAIL)->setIcon('fa fa-eye')
            ->setCssClass('btn btn-circle  btn-success');



              /*  $removeUser = Action::new('removeproduct', 'Supprimer', 'fa fa-trash')
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
                return $action->setLabel('')->setIcon('fa fa-trash')->addCssClass('btn btn-circle btn btn-outline-danger');
            })
            ->update(Crud::PAGE_INDEX, Action::EDIT, function (Action $action) {
            return $action->setLabel('')->setIcon('fa fa-pencil')->addCssClass('btn btn-circle  btn-info');
            })

            //->disable(Action::DELETE, Action::EDIT)
            ->add(Crud::PAGE_INDEX, $detailUser);
          //  ->add(Crud::PAGE_INDEX,$removeUser);



            //->add(Crud::PAGE_NEW, $showproduct);
            //->add(Crud::PAGE_INDEX, $showproduct);
            //->add(Crud::PAGE_INDEX, $updateUser);
    }
     public function  codebar(): Response
     {
         $barcode = new BarcodeGenerator();
         $barcode->setText("12");
         $barcode->setType(BarcodeGenerator::Code128);
         $barcode->setScale(2);
         $barcode->setThickness(25);
         $barcode->setFontSize(10);
         $code = $barcode->generate();
         return $this->render('ProviderOrders/PvReception.html.twig');

     }
    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add('category')
            ->add('price')
            ->add('priceTtc')

            ;
    }
    public function configureFields(string $pageName): iterable
    {
            return [
                IdField::new('id')->onlyOnDetail(),
                DateTimeField::new('createdAt')->onlyOnDetail(),
            Field::new('imageFile')->setFormType(VichImageType::class)->onlyOnDetail(),
            ImageField::new('image')->setBasePath('uploads\images\products')
                ->setCustomOption('uploadDir', 'public\uploads\images\products'),

            TextField::new('name')->setTemplatePath('bundles/easyAdminBundle/page/field_custom.html.twig'),
            MoneyField::new('price',"price")->setCurrency('TND'),
            NumberField::new('BeneficeMargin','Marge beneficiaire'),
            MoneyField::new('priceExcludingTax',"prix hors tax")->setCurrency('TND'),
            ChoiceField::new('tva')->setChoices([
            '0' => '0',
            '7%' => '0.07',
            '13%' => '0.13',
            '19%' => '0.19',
        ]),
            MoneyField::new("priceTtc", "Prix vente")->setCurrency("TND")->setStoredAsCents(false)->setNumDecimals(3),
            NumberField::new('quantity', 'quantity'),
            AssociationField::new('category', 'categorie'),


          /* CollectionField::new('providerOrdersQuantities', 'Commandes Fournisseur'),

          /*  CollectionField::new('CustomerOrdersQuantities', 'Commandes Client')
                ->formatValue(function ($value, $entity) {
                    $nn = '';
                    /* @var $entity \App\Entity\Product */
                    /*foreach($entity->getCustomerOrdersQuantities()as $orders)
                    {
                        $nn .= $orders->getId() . '-' . $orders->getQuantity() . ',';
                    }
                    return $nn;
                })*/

    ];





    }
    /*public function configureFilters(Filters $filters): Filters
    {
        return $filters
            // ...
            ->add(AssociationField::new('category', 'categorie')->mapped(false));
    }*/

}
