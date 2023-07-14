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
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Doctrine\Persistence\ManagerRegistry;

class VoitureController extends AbstractController
{
    #[Route('/voiture', name: 'app_voiture')]
    public function index(Request $request, SluggerInterface $slugger,ImageRepository $imageRepository, HorairesRepository $horairesRepository, VoitureRepository $voitureRepository, OptionRepository $optionRepository, ContactRepository $contactRepository,EntityManagerInterface $entityManager): Response
    {
        $voiture = new Voiture();
        $form = $this->createForm(VoitureType::class, $voiture);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $fichier = $form->get('fichier')->getData();
                if ($fichier) {
                    $originalFilename = pathinfo($fichier->getClientOriginalName(), PATHINFO_FILENAME);
                    $safeFilename = $slugger->slug($originalFilename);
                    $newFilename = $safeFilename . '-' . uniqid() . '.' . $fichier->guessExtension();

                    $voiture->setFichier($newFilename);
                }
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

    #[Route('/supprimer-voiture/{id<\d+>}', name: "app_supprimer_voiture")]
    public function delete(Voiture $voiture,EntityManagerInterface $entityManager) : Response
    {
        if ($this->getUser()) {
            $entityManager->remove($voiture);
            $entityManager->flush();
            return $this->redirectToRoute("app_voiture");
        }
        return $this->redirectToRoute("app_voiture");
    }
}
