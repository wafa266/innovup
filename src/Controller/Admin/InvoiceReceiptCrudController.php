<?php

namespace App\Controller\Admin;

use App\Entity\InvoiceReceipt;
use App\Form\InvoiceReceiptType;
use App\Repository\InvoiceReceiptRepository;
use App\Repository\ProviderOrdersRepository;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Knp\Bundle\SnappyBundle\Snappy\Response\PdfResponse;
use Knp\Snappy\Pdf;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Notifier\Notification\Notification;
use Symfony\Component\Notifier\NotifierInterface;
use Symfony\Component\Notifier\Recipient\Recipient;
use Symfony\Component\Routing\Annotation\Route;


class InvoiceReceiptCrudController extends AbstractCrudController
{/**
 * @var InvoiceReceiptRepository
 */
 private $invoiceRepository;
 private $snappy;

    public function __construct(Pdf $snappy,  InvoiceReceiptRepository $invoiceRepository)
    {
        $this->snappy = $snappy;
        $this->invoiceRepository = $invoiceRepository;
    }
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->overrideTemplate('crud/index', 'invoiceReceipt/index.html.twig')
            ->overrideTemplate('crud/detail','invoiceReceipt/invoice.html.twig')
->setPageTitle('index','Invoice Receipt ')
            ;


    }

    /**
     * @Route(path="/Invoice/new", name="Invoice_new")
      */
    public function newInvoice(Request $request)
        { //creation d'une instance de la classe
            $invoice= new InvoiceReceipt();
            //récuperation du manager
            $manager=$this->getDoctrine()->getManager();
            //creation du formulaire
            $form=$this->createForm(InvoiceReceiptType::class,$invoice);
        }
    /**
     * @Route(path="/admin_74ze5f/invoiceReceipt/pdf/{id}", name="invoice_receipt_pdf")
     */
    public function pdfProviderOrders($id)
    {
        $invoice = $this->invoiceRepository->find($id);
        $html = $this->renderView('invoiceReceipt/invoicePdf.html.twig', [
            'invoice' => $invoice
        ]);

        return new PdfResponse(
            $this->snappy->getOutputFromHtml($html),
            'file'.$id.'.pdf'
        );
    }

    public function configureActions(Actions $actions): Actions
    {  $detailProduct = Action::new('')
        ->linkToCrudAction(Crud::PAGE_DETAIL)
        ->setCssClass('btn   btn-success')->setLabel('show invoice Receipt ');



        return $actions
        ->add(Crud::PAGE_INDEX, $detailProduct)
            ->disable('delete','edit')
        ->update(Crud::PAGE_INDEX, Action::EDIT, function (Action $action) {
        return $action->setLabel('Update ProviderOrder')->setCssClass('btn   btn-info');
    });
    }

    /**
     * @Route("/admin/invoice", name="invoice_new")
     */
    public function ShowInvoice(Request $request , InvoiceReceiptRepository $invoiceReceiptRepository)
    {
        ;
        return $this->render('invoiceReceipt/invoice.html.twig', [
            'invoice' => $invoiceReceiptRepository,



        ]);


    }
    /**
     * @Route(path="/admin_74ze5f/invoice/save", name="invoice_save")
     */
    public function saveInvoice()
    {        return $this->redirectToRoute('admin', [
            'entity' => 'InvoiceReceipt',
            'crudAction' => 'index',
            'menuIndex' => 1,
            'crudControllerFqcn' => 'App\Controller\Admin\InvoiceReceiptCrudController',
        ]);
    }



    public static function getEntityFqcn(): string
    {
        return InvoiceReceipt::class;

    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->onlyOnIndex(),
            AssociationField::new('providerOrders','providersOrders'),

        ];
    }



}
