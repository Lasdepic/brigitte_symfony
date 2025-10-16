<?php

namespace App\Controller;

use App\Entity\Maladie;
use App\Form\MaladieType;
use App\Repository\MaladieRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/maladie')]
final class MaladieController extends AbstractController
{
    #[Route(name: 'app_maladie_index', methods: ['GET'])]
    public function index(MaladieRepository $maladieRepository): Response
    {
        return $this->render('maladie/index.html.twig', [
            'maladies' => $maladieRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_maladie_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $maladie = new Maladie();
        $form = $this->createForm(MaladieType::class, $maladie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($maladie);
            $entityManager->flush();

            return $this->redirectToRoute('app_maladie_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('maladie/new.html.twig', [
            'maladie' => $maladie,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_maladie_show', methods: ['GET'])]
    public function show(Maladie $maladie): Response
    {
        return $this->render('maladie/show.html.twig', [
            'maladie' => $maladie,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_maladie_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Maladie $maladie, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(MaladieType::class, $maladie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_maladie_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('maladie/edit.html.twig', [
            'maladie' => $maladie,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_maladie_delete', methods: ['POST'])]
    public function delete(Request $request, Maladie $maladie, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$maladie->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($maladie);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_maladie_index', [], Response::HTTP_SEE_OTHER);
    }
}
