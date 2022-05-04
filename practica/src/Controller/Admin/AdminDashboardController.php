<?php

namespace App\Controller\Admin;

use App\Entity\AgeRestrictions;
use App\Entity\Genre;
use App\Entity\Movies;
use App\Entity\Quality;
use App\Repository\GenreRepository;
use App\Repository\MoviesRepository;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminDashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        return $this->render('admin/index.html.twig');

    }


    private $entityManager;
    private $moviesRepo;
    private $genreRepo;

    public function __construct(EntityManagerInterface $em, MoviesRepository $mRepo, GenreRepository $gRepo) {
        $this->entityManager = $em;
        $this->moviesRepo = $mRepo;
        $this->genreRepo = $gRepo;
    }


    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Practica');
    }


    public function configureMenuItems(): iterable
    {

        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::subMenu("Fimle", "fa fa-film")->setSubItems([
            MenuItem::linkToCrud('Film', '', Movies::class),
            MenuItem::linkToCrud('Gen', '', Genre::class),
            MenuItem::linkToCrud("Calitate", '', Quality::class),
            MenuItem::linkToCrud('Age restriction', '', AgeRestrictions::class)
        ]);

    }
}
