<?php

namespace App\Controller\Admin;

use App\Entity\Category;
use App\Entity\Customer;
use App\Entity\CustomerOrders;
use App\Entity\Product;
use App\Entity\Provider;
use App\Entity\ProviderOrders;
use App\Entity\User;
use App\Repository\CustomerOrdersRepository;
use App\Repository\CustomerRepository;
use App\Repository\ProductRepository;
use App\Repository\UserRepository;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\UserMenu;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;


class DashboardController extends AbstractDashboardController
{
    protected $userRepository;
    protected $customerRepository;
    protected $product;
    protected $customerOrdersRepository;



    public function __construct(
        UserRepository $userRepository,
        CustomerRepository $customerRepository,
        ProductRepository $product,
        CustomerOrdersRepository $customerOrdersRepository
    )
    {
        $this->userRepository = $userRepository;
        $this->customerRepository = $customerRepository;
        $this->product = $product;
        $this->customerOrdersRepository= $customerOrdersRepository;



    }

    /**
     * @Route("/{_locale}/admin", name="admin")
     */
    public function index(): Response
    {
        return $this->render('bundles/EasyAdminBundle/welcome.html.twig', [
            'controller_name' => 'DashboardController',
            'CountAllUser' => $this->userRepository->countAllUser(),
            'CountAllCustomer' => $this->customerRepository->CountAllCustomer(),
            'Product' => $this->product->findAll(),
            'CustomerOrders'=>$this->customerOrdersRepository->countAllCustomerOrders(),
        ]);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('MyErp')
            ->disableUrlSignatures();
    }


    public function configureMenuItems(): iterable
    {


        return [
            MenuItem::linktoDashboard('Dashboard', 'fa fa-home'),
            MenuItem::linkToCrud('Utilisateurs', 'fa fa-users', User::class),
                MenuItem::linkToCrud('Produits', 'fa fa-cubes', Product::class),
                MenuItem::linkToCrud('Categories', 'fa fa-tags', Category::class),
                MenuItem::linkToCrud('Commandes fournisseurs', 'fa fa-tags', ProviderOrders ::class),
                MenuItem::linkToCrud('Fournisseurs', 'fa fa-truck', Provider::class),

                MenuItem::linkToCrud('Commandes clients', 'fa fa-shopping-bag', CustomerOrders::class),
                MenuItem::linkToCrud('clients', 'fa fa-shopping-bag', Customer::class)
            ];



            // ...

    }

    public function configureAssets(): Assets
    {
        return Assets::new()

            ->addCssFile('build/css/innovup/c3.min.css')
            ->addCssFile('build/css/innovup/jquery-jvectormap-2.0.2.css')
            ->addCssFile('build/css/innovup/chartist.min.css')
            ->addCssFile('build/css/innovup/style.min.css')
            ->addCssFile('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css')

            ->addJsFile('build/js/innovup/jquery.min.js')
            ->addJsFile('build/js/innovup/popper.min.js')
            ->addJsFile('build/js/innovup/bootstrap.min.js')
            ->addJsFile('build/js/innovup/app-style-switcher.js')
            ->addJsFile('build/js/innovup/feather.min.js')
            ->addJsFile('build/js/innovup/bootstrap-tagsinput.js')
            ->addJsFile('build/js/innovup/perfect-scrollbar.jquery.min.js')
            ->addJsFile('build/js/innovup/sidebarmenu.js')
            ->addJsFile('build/js/innovup/custom.min.js')
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
