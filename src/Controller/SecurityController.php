<?php

namespace App\Controller;

use App\Form\ConnexionType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use App\Repository\HorairesRepository;

class SecurityController extends AbstractController
{
    #[Route('/connexion', name: 'app_connexion')]
    public function login(AuthenticationUtils $authenticationUtils, Request $request, ManagerRegistry $doctrine, HorairesRepository $horairesRepository): Response
    {
        if (!$this->getUser()) {

            $error = $authenticationUtils->getLastAuthenticationError();
            $lastEmail = $authenticationUtils->getLastUsername();

            $form = $this->createForm(ConnexionType::class);
            $form->handleRequest($request);

            return $this->render('security/login.html.twig', [
                'error' => $error,
                'last_email' => $lastEmail,
                'connexionForm' => $form->createView(),
                'horaires' => $horairesRepository->findBy([]),
            ]);
        }
        return $this->redirectToRoute('app_accueil');
    }

    #[Route('/deconnexion', name: 'app_deconnexion')]
    public function logout()
    {
        
    }
}