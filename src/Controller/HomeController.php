<?php

namespace App\Controller;

use App\Repository\CustomerOrdersRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use CodeItNow\BarcodeBundle\Utils\BarcodeGenerator;

class HomeController extends AbstractController
{
    /**
     * @var CustomerOrdersRepository
     */
    private $customerOrdersRepository;

    public function __construct(CustomerOrdersRepository $customerOrdersRepository)
    {
        $this->customerOrdersRepository= $customerOrdersRepository;
    }
    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        return $this->render('home/index.html.twig');
    }
 /**
     * @Route("/contact", name="contact")
     */
    public function contact(): Response
    {
        $barcode = new BarcodeGenerator();
        $barcode->setText("12");
        $barcode->setType(BarcodeGenerator::Code128);
        $barcode->setScale(2);
        $barcode->setThickness(25);
        $barcode->setFontSize(10);
        $code = $barcode->generate();

    }
    
    /**
     * @Route("/service", name="service")
     */
    public function service(): Response
    {
        return $this->render('home/services.html.twig');
    }

    /**
     * @Route(path="/monthCustomerOrders", methods={"GET"}, name="month_customer_orders")
     */
    public function getMonthCustomerOrders(): Response
    {
        $monthCustomerOrders = $this->customerOrdersRepository->monthCustomerOrders();
        $response = new JsonResponse();

        $response->setData(['data' => $monthCustomerOrders]);

        return $response;
    }
    /**
     * @Route(path="/donutechart", methods={"GET"}, name="donut_chart")
     */
    public function getDonutchart(): Response
    {
        $monthCustomerOrders = $this->customerOrdersRepository->monthCustomerOrders();
        $response = new JsonResponse();

        $response->setData(['data' => $monthCustomerOrders]);

        return $response;
    }

}
