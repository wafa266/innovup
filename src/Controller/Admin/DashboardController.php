<?php

namespace App\Controller\Admin;

use App\Entity\ExitVoucher;
use App\Entity\InvoiceReceipt;
use App\Entity\Category;
use App\Entity\Customer;
use App\Entity\CustomerOrders;
use App\Entity\CustomerOrdersQuantity;
use App\Entity\Product;
use App\Entity\Provider;
use App\Entity\ProviderOrders;
use App\Entity\ProviderOrdersQuantity;
use App\Entity\User;
use App\Repository\CustomerOrdersQuantityRepository;
use App\Repository\CustomerOrdersRepository;
use App\Repository\CustomerRepository;
use App\Repository\ProductRepository;
use App\Repository\UserRepository;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\UserMenu;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;


class DashboardController extends AbstractDashboardController
{
    protected $userRepository;
    protected $customerRepository;
    protected $product;
    protected $customerOrdersRepository;
    protected $products;
    protected $productQuantities;

    public function __construct(
        UserRepository $userRepository,
        CustomerRepository $customerRepository,
        ProductRepository $product,
        CustomerOrdersRepository $customerOrdersRepository,
        ProductRepository $products,
        CustomerOrdersQuantityRepository $productQuantities

    )
    {
        $this->userRepository = $userRepository;
        $this->customerRepository = $customerRepository;
        $this->product = $product;
        $this->customerOrdersRepository= $customerOrdersRepository;
        $this->products= $products;
        $this->productQuantities=$productQuantities;
    }

    /**
     * @Route("/{_locale}/admin", name="admin")
     * name="admin",
     * requirements={
     * "_locale": "en|fr",
     * }
     */
    public function index(): Response
    {
        return $this->render('bundles/EasyAdminBundle/welcome.html.twig', [
            'controller_name' => 'DashboardController',
            'CountAllUser' => $this->userRepository->countAllUser(),
            'CountAllCustomer' => $this->customerRepository->CountAllCustomer(),
            'CustomerOrders' => $this->customerOrdersRepository->countAllCustomerOrders(),
            'products' => $this->products->findAll(),
            'customerOrders' => $this->customerOrdersRepository->findAll(),
            'customers' => $this->customerRepository,
            'maxCustomerOrders' => $this->customerOrdersRepository->maxCustomerOrders(),
            'maxProductOrders' => $this->productQuantities->maxCustomerOrdersProduct(),
            'users'=>$this->userRepository->findAll(),
            'lastProducts' =>$this->product->CountLastProduct(),
        ]);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('MyErp')
            ->setFaviconPath('build/images/favicon.ico')
            ->disableUrlSignatures();
    }

    public function configureMenuItems(): iterable
    {

        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');

        yield MenuItem::linkToCrud('Users', 'fa fa-users', User::class);
        yield MenuItem::linkToCrud('Products', 'fa fa-cubes', Product::class);
        yield MenuItem::linkToCrud('Providers', 'fa fa-truck', Provider::class);
        yield MenuItem::linkToCrud('Customers', 'fa fa-shopping-bag', Customer::class);
        yield MenuItem::linkToCrud('Categories', 'fa fa-list-alt', Category::class);
        yield MenuItem::linkToCrud('Provider Orders', 'fa fa-shopping-cart', ProviderOrders::class);
        yield MenuItem::linkToCrud('Customer Orders', 'fa fa-shopping-bag', CustomerOrders::class);
        yield MenuItem::linkToCrud('Invoice Receipt', 'fa fa-shopping-bag', InvoiceReceipt::class);
        yield MenuItem::linkToCrud('Exit Voucher', 'fa fa-shopping-bag', ExitVoucher::class);

    }

    public function configureAssets(): Assets
    {
        return Assets::new()

            ->addCssFile('build/css/innovup/c3.min.css')
            ->addCssFile('build/css/innovup/jquery-jvectormap-2.0.2.css')
            ->addCssFile('build/css/innovup/chartist.min.css')
            ->addCssFile('build/css/innovup/style.min.css')
            ->addCssFile('vendors/font-awesome/css/font-awesome.css')
            ->addCssFile('https://unpkg.com/swiper/swiper-bundle.css')
            ->addCssFile('https://unpkg.com/swiper/swiper-bundle.min.css')
            ->addJsFile('build/js/innovup/jquery.min.js')
            ->addJsFile('build/js/innovup/popper.min.js')
           ->addJsFile('build/js/innovup/bootstrap.min.js')
            ->addJsFile('build/js/innovup/chartist.min.js')
            ->addJsFile('build/js/innovup/app-style-switcher.js')
            ->addJsFile('build/js/innovup/feather.min.js')
            ->addJsFile('build/js/innovup/bootstrap-tagsinput.js')
            ->addJsFile('build/js/innovup/perfect-scrollbar.jquery.min.js')
            ->addJsFile('build/js/innovup/sidebarmenu.js')
            ->addJsFile('build/js/innovup/custom.min.js')
            ->addJsFile('https://unpkg.com/swiper/swiper-bundle.js')
            ->addJsFile('https://unpkg.com/swiper/swiper-bundle.min.js')
            ->addJsFile('build/js/innovup/innovup.js');
    }

    public function configureUserMenu(UserInterface $user): UserMenu
    {
        // Usually it's better to call the parent method because that gives you a
        // user menu with some menu items already created ("sign out", "exit impersonation", etc.)
        // if you prefer to create the user menu from scratch, use: return UserMenu::new()->...
        return Parent::configureUserMenu($user)
            // use the given $user object to get the user name
            ->setName($user->getUsername())
            ->displayUserAvatar(true)
            ->setGravatarEmail($user->getUsername())
            // you can use any type of menu item, except submenu
            ->addMenuItems([
                MenuItem::linkToRoute('My Profile', 'fa fa-id-card', '...', ['...' => '...']),
                MenuItem::linkToRoute('Settings', 'fa fa-user-cog', '...', ['...' => '...']),
                MenuItem::section(),
                MenuItem::linkToLogout('Logout', 'fa fa-sign-out'),
            ]);
    }
}
