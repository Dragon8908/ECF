<?php

namespace App\Controller;


use App\Repository\HorairesRepository;
use App\Repository\UserRepository;
use App\Repository\TemoignageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfilController extends AbstractController
{
    #[Route('/profil', name: 'app_profil')]
    public function index(HorairesRepository $horairesRepository, UserRepository $userRepository, TemoignageRepository $temoignageRepository): Response
    {
        return $this->render('profil/index.html.twig', [
            'horaires' => $horairesRepository->findBy([]),
            'users' => $userRepository->findBy([]),
            'temoignages' => $temoignageRepository->findBy([]),
        ]);
    }
}