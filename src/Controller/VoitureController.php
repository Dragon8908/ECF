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
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Filtre;
use App\Form\FiltreType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Knp\Component\Pager\PaginatorInterface;

class VoitureController extends AbstractController
{
    #[Route('/voiture', name: 'app_voiture')]
    public function index(ManagerRegistry $doctrine,Request $request, SluggerInterface $slugger,ImageRepository $imageRepository, HorairesRepository $horairesRepository, VoitureRepository $voitureRepository, OptionRepository $optionRepository, ContactRepository $contactRepository,EntityManagerInterface $entityManager, PaginatorInterface $paginator): Response
    {
        $data = new Filtre();
        $formFiltre = $this->createForm(FiltreType::class, $data);
        $formFiltre->handleRequest($request);
        [$prixmin, $prixmax, $kmmin, $kmmax, $anneemin, $anneemax] = $voitureRepository->findMinMax($data);
        $pagination = $paginator->paginate(
            $voitureRepository->findSearch($data),
            $request->query->getInt('page', 1),
            6
        );
        if ($request->get('ajax')) {
            return new JsonResponse([
                'prixmin' => $prixmin,
                'prixmax' => $prixmax,
                'kmmax' => $kmmax,
                'kmmin' => $kmmin,
                'anneemin' => $anneemin,
                'anneemax' => $anneemax
            ]);
        }

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

        $repository = $doctrine->getRepository(Voiture::class);
        $cars = $repository->findAll();

        /*if ($request->isXmlHttpRequest()) { 
            $data = json_decode($request->getContent(), true);
            $minPrice = $data['minPrice'];
            $maxPrice = $data['maxPrice'];
            $minKm = $data['minKm'];
            $maxKm = $data['maxKm'];
            $minYear = $data['minYear'];
            $maxYear = $data['maxYear'];
            
            $cars = $voitureRepository->findByRange($minPrice, $maxPrice, $minKm, $maxKm, $minYear, $maxYear);
            return $this->render('voiture/index.html.twig', [
                "voitures" => $voiture,
                "horaires" => $horairesRepository->findBy([]),
            ]);
        }*/
        
        return $this->render('voiture/index.html.twig', [
            'voitureForm' => $form->createView(),
            'filtreForm' => $formFiltre->createView(),
            'images' => $imageRepository->findBy([]),
            'horaires' => $horairesRepository->findBy([]),
            'voitures' => $voitureRepository->findBy([]),
            'options' => $optionRepository->findBy([]),
            'contacts' => $contactRepository->findBy([]),
            'prixmin' => $prixmin,
            'prixmax' => $prixmax,
            'kmmax' => $kmmax,
            'kmmin' => $kmmin,
            'anneemin' => $anneemin,
            'anneemax' => $anneemax,
            'cars' => $pagination
        ]);
    }

    #[Route('/supprimer-voiture/{id<\d+>}', name: "app_supprimer_voiture")]
    public function delete(Voiture $voiture,EntityManagerInterface $entityManager) : Response
    {
        if ($this->isGranted('ROLE_USER')) {
            $entityManager->remove($voiture);
            $entityManager->flush();
        }
        return $this->redirectToRoute("app_voiture");
    }
}
