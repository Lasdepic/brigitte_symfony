<?php

namespace App\Controller;

use App\Entity\Fonctionnalites;
use App\Form\FonctionnalitesType;
use App\Repository\FonctionnalitesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/fonctionnalites')]
final class FonctionnalitesController extends AbstractController
{
    #[Route(name: 'app_fonctionnalites_index', methods: ['GET'])]
    public function index(FonctionnalitesRepository $fonctionnalitesRepository): Response
    {
        return $this->render('fonctionnalites/index.html.twig', [
            'fonctionnalites' => $fonctionnalitesRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_fonctionnalites_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $fonctionnalite = new Fonctionnalites();
        $form = $this->createForm(FonctionnalitesType::class, $fonctionnalite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($fonctionnalite);
            $entityManager->flush();

            return $this->redirectToRoute('app_fonctionnalites_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('fonctionnalites/new.html.twig', [
            'fonctionnalite' => $fonctionnalite,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_fonctionnalites_show', methods: ['GET'])]
    public function show(Fonctionnalites $fonctionnalite): Response
    {
        return $this->render('fonctionnalites/show.html.twig', [
            'fonctionnalite' => $fonctionnalite,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_fonctionnalites_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Fonctionnalites $fonctionnalite, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(FonctionnalitesType::class, $fonctionnalite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_fonctionnalites_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('fonctionnalites/edit.html.twig', [
            'fonctionnalite' => $fonctionnalite,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_fonctionnalites_delete', methods: ['POST'])]
    public function delete(Request $request, Fonctionnalites $fonctionnalite, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$fonctionnalite->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($fonctionnalite);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_fonctionnalites_index', [], Response::HTTP_SEE_OTHER);
    }
}
