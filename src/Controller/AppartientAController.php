<?php

namespace App\Controller;

use App\Entity\AppartientA;
use App\Form\AppartientAType;
use App\Repository\AppartientARepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/appartient/a')]
final class AppartientAController extends AbstractController
{
    #[Route(name: 'app_appartient_a_index', methods: ['GET'])]
    public function index(AppartientARepository $appartientARepository): Response
    {
        return $this->render('appartient_a/index.html.twig', [
            'appartient_as' => $appartientARepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_appartient_a_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $appartientum = new AppartientA();
        $form = $this->createForm(AppartientAType::class, $appartientum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($appartientum);
            $entityManager->flush();

            return $this->redirectToRoute('app_appartient_a_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('appartient_a/new.html.twig', [
            'appartientum' => $appartientum,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_appartient_a_show', methods: ['GET'])]
    public function show(AppartientA $appartientum): Response
    {
        return $this->render('appartient_a/show.html.twig', [
            'appartientum' => $appartientum,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_appartient_a_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, AppartientA $appartientum, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(AppartientAType::class, $appartientum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_appartient_a_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('appartient_a/edit.html.twig', [
            'appartientum' => $appartientum,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_appartient_a_delete', methods: ['POST'])]
    public function delete(Request $request, AppartientA $appartientum, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$appartientum->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($appartientum);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_appartient_a_index', [], Response::HTTP_SEE_OTHER);
    }
}
