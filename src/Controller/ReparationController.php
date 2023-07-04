<?php

namespace App\Controller;

use App\Repository\HorairesRepository;
use App\Repository\ServiceRepository;
use App\Entity\Service;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class ReparationController extends AbstractController
{
    public function __construct(private EntityManagerInterface $em){}

    #[Route('/reparation', name: 'app_reparation')]
    public function index(HorairesRepository $horairesRepository, ServiceRepository $serviceRepository): Response
    {
        return $this->render('reparation/index.html.twig', [
            'horaires' => $horairesRepository->findBy([]),
            'services' => $serviceRepository->findBy([]),
        ]);
    }

    #[Route('/service/supprimer/{id}', name: 'app_supprimer_service')]
    public function suppresion(Service $service): Response
    {
        $this->em->getRepository(Service::class)->remove($service, true);
        return $this->redirectToRoute('app_reparartion');
    }
}
