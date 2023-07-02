<?php

namespace App\Controller;

use App\Repository\ContactRepository;
use App\Repository\HorairesRepository;
use App\Repository\VoitureRepository;
use App\Repository\ImageRepository;
use App\Repository\OptionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VoitureController extends AbstractController
{
    #[Route('/voiture', name: 'app_voiture')]
    public function index(ImageRepository $imageRepository, HorairesRepository $horairesRepository, VoitureRepository $voitureRepository, OptionRepository $optionRepository, ContactRepository $contactRepository): Response
    {
        return $this->render('voiture/index.html.twig', [
            'images' => $imageRepository->findBy([]),
            'horaires' => $horairesRepository->findBy([]),
            'voitures' => $voitureRepository->findBy([]),
            'options' => $optionRepository->findBy([]),
            'contacts' => $contactRepository->findBy([]),
        ]);
    }
}
