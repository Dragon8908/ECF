<?php

namespace App\Controller;

use App\Repository\HorairesRepository;
use App\Repository\TemoignageRepository;
use App\Entity\Temoignage;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\TemoignageType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;

class TemoignageController extends AbstractController
{
    #[Route('/temoignage', name: 'app_temoignage')]
    public function index(Request $request, HorairesRepository $horairesRepository, TemoignageRepository $temoignageRepository,EntityManagerInterface $entityManager): Response
    {
        $temoignage = new Temoignage();
        $form = $this->createForm(TemoignageType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($temoignage);
            $entityManager->flush();
            return $this->redirectToRoute("app_accueil");
        }
        return $this->render('temoignage/index.html.twig', [
           'temoignageForm' => $form->createView(),
           'temoignages' => $temoignageRepository->findBy([]),
           'horaires' => $horairesRepository->findBy([]),
        ]);
    }
    
    #[Route('/temoignage/{id<\d+>}', name: 'app_validation_avis')]
    public function validate(Temoignage $temoignage,EntityManagerInterface $entityManager): Response
    {
        $entityManager->persist($temoignage);
        $entityManager->flush();
        return $this->redirectToRoute('app_profil');
    }
}
