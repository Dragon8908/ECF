<?php

namespace App\Controller;


use App\Repository\HorairesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    
    #[Route(path: '/connexion', name: 'app_connexion')]
    public function login(
    AuthenticationUtils $authenticationUtils, HorairesRepository $horairesRepository): Response
    {
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', [
            'last_username' => $lastUsername, 
            'error' => $error,
            'horaires' => $horairesRepository->findBy([])
        ]);
    }

    #[Route(path: '/deconnexion', name: 'app_deconnexion')]
    public function logout(): void
    {
        throw new \LogicException('This method can be blank.');
    }
}