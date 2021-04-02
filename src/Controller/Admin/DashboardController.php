<?php

namespace App\Controller\Admin;

use App\Entity\Category;
use App\Entity\Customer;
use App\Entity\CustomerOrders;
use App\Entity\Product;
use App\Entity\Provider;
use App\Entity\ProviderOrders;
use App\Entity\ProviderOrdersProduct;
use App\Entity\User;
use App\Repository\CustomerRepository;
use App\Repository\ProductRepository;
use App\Repository\UserRepository;
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


    public function __construct(
        UserRepository $userRepository,
        CustomerRepository $customerRepository,
        ProductRepository $product
    ) {
      $this->userRepository=$userRepository;
        $this->customerRepository=$customerRepository;
        $this->product=$product;


    }
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return $this->render('bundles/EasyAdminBundle/welcome.html.twig', [
            'controller_name' => 'DashboardController',
            'CountAllUser'=>$this->userRepository->countAllUser() ,
            'CountAllCustomer'=>$this->customerRepository->CountAllCustomer(),
            'Product'=>$this->product->findAll(),
        ]);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('ERP Stock Management');

    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Utilisateurs', 'fa fa-users', User::class);
        yield MenuItem::linkToCrud('Produits', 'fa fa-cubes', Product::class);
        yield MenuItem::linkToCrud('Fournisseurs', 'fa fa-truck', Provider::class);
        yield MenuItem::linkToCrud('clients', 'fa fa-shopping-bag', Customer::class);
        yield MenuItem::linkToCrud('Catégories', 'fa fa-list-alt', Category::class);
        yield MenuItem::linkToCrud('Commandes fournisseurs', 'fa fa-shopping-cart', ProviderOrdersProduct::class);
        yield MenuItem::linkToCrud('Commandes clients', 'fa fa-shopping-bag', CustomerOrders::class);
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
