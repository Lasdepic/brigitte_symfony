<?php

namespace App\Controller;

use App\Entity\Origine;
use App\Form\OrigineType;
use App\Repository\OrigineRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/origine')]
final class OrigineController extends AbstractController
{
    #[Route(name: 'app_origine_index', methods: ['GET'])]
    public function index(OrigineRepository $origineRepository): Response
    {
        return $this->render('origine/index.html.twig', [
            'origines' => $origineRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_origine_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $origine = new Origine();
        $form = $this->createForm(OrigineType::class, $origine);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($origine);
            $entityManager->flush();

            return $this->redirectToRoute('app_origine_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('origine/new.html.twig', [
            'origine' => $origine,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_origine_show', methods: ['GET'])]
    public function show(Origine $origine): Response
    {
        return $this->render('origine/show.html.twig', [
            'origine' => $origine,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_origine_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Origine $origine, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(OrigineType::class, $origine);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_origine_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('origine/edit.html.twig', [
            'origine' => $origine,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_origine_delete', methods: ['POST'])]
    public function delete(Request $request, Origine $origine, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$origine->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($origine);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_origine_index', [], Response::HTTP_SEE_OTHER);
    }
}
