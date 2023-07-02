<?php

namespace App\Controller\Admin;


use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Contact;
use App\Entity\Horaires;
use App\Entity\Image;
use App\Entity\Option;
use App\Entity\Temoignage;
use App\Entity\User;
use App\Entity\Voiture;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;

class DashboardController extends AbstractDashboardController
{
    public function __construct(private AdminUrlGenerator $adminUrlGenerator)
    {
        
    } 
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Garage V. Parrot');
    }

    public function configureMenuItems(): iterable
    { 
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Nous contacter', 'fas fa-pen', Contact::class);
        yield MenuItem::linkToCrud('Nos Horaires', 'fas fa-list', Horaires::class);
        yield MenuItem::linkToCrud('Images', 'fas fa-bowl-food', Image::class);
        yield MenuItem::linkToCrud('Les options', 'fas fa-list', Option::class);
        yield MenuItem::linkToCrud('Les témoignages', 'fas fa-drumstick-bite', Temoignage::class);
        yield MenuItem::linkToCrud('Utilisateurs', 'fas fa-image', User::class);
        yield MenuItem::linkToCrud('Nos voitures', 'fas fa-utensils', Voiture::class);
    }
}