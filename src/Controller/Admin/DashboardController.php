<?php

namespace App\Controller\Admin;

use App\Entity\Category;
use App\Entity\CustomerOrders;
use App\Entity\Product;
use App\Entity\Provider;
use App\Entity\ProviderOrders;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Innovup');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Utilisateurs', 'fas fa-list', User::class);
        yield MenuItem::linkToCrud('Produits', 'fas fa-list', Product::class);
        yield MenuItem::linkToCrud('Fournisseurs', 'fas fa-list', Provider::class);
        yield MenuItem::linkToCrud('Catégories', 'fas fa-list', Category::class);
        yield MenuItem::linkToCrud('Commandes fournisseurs', 'fas fa-list', ProviderOrders::class);
        yield MenuItem::linkToCrud('Commandes clients', 'fas fa-list', CustomerOrders::class);
    }
}
