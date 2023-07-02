<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\InscriptionType;
use App\Repository\HorairesRepository;
use App\Security\UsersAuthenticator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\UserAuthenticatorInterface;

class InscriptionController extends AbstractController
{
    private $manager;
    public function __construct(EntityManagerInterface $manager)
    {
        $this->manager = $manager;
    }

    #[Route('/inscription', name: 'app_inscription')]
    public function register(Request $request, 
    UserPasswordHasherInterface $userPasswordHasher, 
    UserAuthenticatorInterface $userAuthenticator, 
    UsersAuthenticator $authenticator, 
    EntityManagerInterface $entityManager,  
    HorairesRepository $horairesRepository): Response
    {
        

        $user = new User();
        $form = $this->createForm(InscriptionType::class, $user);
        $form->handleRequest($request);
 
        if ($form->isSubmitted() && $form->isValid()) {
            $user=$form->getData();
            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('password')->getData()
                )
            );

            $entityManager->persist($user); 
            $entityManager->flush();

            return $userAuthenticator->authenticateUser(
                $user,
                $authenticator,
                $request
            );
        }

        return $this->render('inscription/index.html.twig', [
            'inscriptionForm' => $form->createView(),
            'horaires' => $horairesRepository->findBy([])
        ]);
    }
}