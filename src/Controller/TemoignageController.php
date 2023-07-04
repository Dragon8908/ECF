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
    public function index(Request $request, HorairesRepository $horairesRepository, TemoignageRepository $temoignageRepository): Response
    {
        $form = $this->createForm(TemoignageType::class);
        $form->handleRequest($request);
        return $this->render('temoignage/index.html.twig', [
           'temoignageForm' => $form->createView(),
           'temoignages' => $temoignageRepository->findBy([]),
           'horaires' => $horairesRepository->findBy([]),
        ]);
    }

    #[Route('/temoignage/{id}', name: 'app_validation')]
    public function validate(Temoignage $temoignage,EntityManagerInterface $em): Response
    {

        $em->persist($temoignage);
        $em->flush();

        return $this->redirectToRoute('app_profil');
    }
}
