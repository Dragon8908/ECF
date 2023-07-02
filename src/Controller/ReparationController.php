<?php

namespace App\Controller;

use App\Repository\HorairesRepository;
use App\Repository\ServiceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ReparationController extends AbstractController
{
    #[Route('/reparation', name: 'app_reparation')]
    public function index(HorairesRepository $horairesRepository, ServiceRepository $serviceRepository): Response
    {
        return $this->render('reparation/index.html.twig', [
            'horaires' => $horairesRepository->findBy([]),
            'services' => $serviceRepository->findBy([]),
        ]);
    }
}
