<?php

namespace App\Controller;

use App\Repository\HorairesRepository;
use App\Repository\ServiceRepository;
use App\Entity\Service;
use App\Form\ServiceType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

class ReparationController extends AbstractController
{
    public function __construct(private EntityManagerInterface $em){}

    #[Route('/reparation', name: 'app_reparation')]
    public function index(HorairesRepository $horairesRepository, ServiceRepository $serviceRepository,Request $request, EntityManagerInterface $entityManager): Response
    {
        $service = new Service();
        $form = $this->createForm(ServiceType::class, $service);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($service);
            $entityManager->flush();
            return $this->redirectToRoute("app_reparation");
        }
        return $this->render('reparation/index.html.twig', [
            "serviceForm" => $form->createView(),
            'horaires' => $horairesRepository->findBy([]),
            'services' => $serviceRepository->findBy([]),
        ]);
    }

    #[Route('/supprimer-service/{id<\d+>}', name: "app_supprimer_service")]
    public function supprimer(Service $service, EntityManagerInterface $entityManager) : Response
    {
        if ($this->isGranted('ROLE_ADMIN')) {
            $entityManager->remove($service);
            $entityManager->flush();
        }
        return $this->redirectToRoute("app_accueil");
    }
}
