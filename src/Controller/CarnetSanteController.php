<?php

namespace App\Controller;

use App\Entity\CarnetSante;
use App\Form\CarnetSanteType;
use App\Repository\CarnetSanteRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/carnet/sante')]
final class CarnetSanteController extends AbstractController
{
    #[Route(name: 'app_carnet_sante_index', methods: ['GET'])]
    public function index(CarnetSanteRepository $carnetSanteRepository): Response
    {
        return $this->render('carnet_sante/index.html.twig', [
            'carnet_santes' => $carnetSanteRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_carnet_sante_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $carnetSante = new CarnetSante();
        $form = $this->createForm(CarnetSanteType::class, $carnetSante);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($carnetSante);
            $entityManager->flush();

            return $this->redirectToRoute('app_carnet_sante_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('carnet_sante/new.html.twig', [
            'carnet_sante' => $carnetSante,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_carnet_sante_show', methods: ['GET'])]
    public function show(CarnetSante $carnetSante): Response
    {
        return $this->render('carnet_sante/show.html.twig', [
            'carnet_sante' => $carnetSante,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_carnet_sante_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, CarnetSante $carnetSante, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CarnetSanteType::class, $carnetSante);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_carnet_sante_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('carnet_sante/edit.html.twig', [
            'carnet_sante' => $carnetSante,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_carnet_sante_delete', methods: ['POST'])]
    public function delete(Request $request, CarnetSante $carnetSante, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$carnetSante->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($carnetSante);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_carnet_sante_index', [], Response::HTTP_SEE_OTHER);
    }
}
