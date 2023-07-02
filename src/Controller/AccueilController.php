<?php

namespace App\Controller;


use App\Repository\ImageRepository;
use App\Repository\HorairesRepository;
use App\Repository\TemoignageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
    #[Route('/', name: 'app_accueil')]
    public function index(ImageRepository $imageRepository, HorairesRepository $horairesRepository, TemoignageRepository $temoignageRepository): Response
    {
        return $this->render('accueil/index.html.twig', [
            'images' => $imageRepository->findBy([]), 
            'horaires' => $horairesRepository->findBy([]),
            'temoignages' => $temoignageRepository->findBy([]),
        ]);
    }
}