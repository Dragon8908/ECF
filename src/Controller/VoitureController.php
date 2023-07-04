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
use App\Form\VoitureType;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Voiture;
use Doctrine\ORM\EntityManagerInterface;

class VoitureController extends AbstractController
{
    #[Route('/voiture', name: 'app_voiture')]
    public function index(Request $request,ImageRepository $imageRepository, HorairesRepository $horairesRepository, VoitureRepository $voitureRepository, OptionRepository $optionRepository, ContactRepository $contactRepository,EntityManagerInterface $entityManager): Response
    {
        $voiture = new Voiture();
        $form = $this->createForm(VoitureType::class, $voiture);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $entityManager->persist($voiture);
            $entityManager->flush();
        }
        return $this->render('voiture/index.html.twig', [
            'voitureForm' => $form->createView(),
            'images' => $imageRepository->findBy([]),
            'horaires' => $horairesRepository->findBy([]),
            'voitures' => $voitureRepository->findBy([]),
            'options' => $optionRepository->findBy([]),
            'contacts' => $contactRepository->findBy([]),
        ]);
    }
}
