<?php

namespace App\Controller;

use App\Entity\Concerne;
use App\Form\ConcerneType;
use App\Repository\ConcerneRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/concerne')]
final class ConcerneController extends AbstractController
{
    #[Route(name: 'app_concerne_index', methods: ['GET'])]
    public function index(ConcerneRepository $concerneRepository): Response
    {
        return $this->render('concerne/index.html.twig', [
            'concernes' => $concerneRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_concerne_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $concerne = new Concerne();
        $form = $this->createForm(ConcerneType::class, $concerne);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($concerne);
            $entityManager->flush();

            return $this->redirectToRoute('app_concerne_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('concerne/new.html.twig', [
            'concerne' => $concerne,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_concerne_show', methods: ['GET'])]
    public function show(Concerne $concerne): Response
    {
        return $this->render('concerne/show.html.twig', [
            'concerne' => $concerne,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_concerne_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Concerne $concerne, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ConcerneType::class, $concerne);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_concerne_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('concerne/edit.html.twig', [
            'concerne' => $concerne,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_concerne_delete', methods: ['POST'])]
    public function delete(Request $request, Concerne $concerne, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$concerne->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($concerne);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_concerne_index', [], Response::HTTP_SEE_OTHER);
    }
}
