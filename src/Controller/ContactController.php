<?php

namespace App\Controller;

use App\Repository\ContactRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Form\ContactType;
use App\Repository\HorairesRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController 
{
    #[Route('/contact', name: 'app_contact')]
    public function index(Request $request, HorairesRepository $horairesRepository, ContactRepository $contactRepository): Response
    {   
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);
        return $this->render('contact/index.html.twig', [
           'contactForm' => $form->createView(),
           'contacts' => $contactRepository->findBy([]),
           'horaires' => $horairesRepository->findBy([]),
        ]);
   }
}