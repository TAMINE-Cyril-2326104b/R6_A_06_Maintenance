<?php

namespace App\Controller;

use App\Repository\SportRepository;
use App\Repository\ChampionnatRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Response;

final class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home', methods: ['GET'])]
    public function index(
        SportRepository $sportRepo,
        ChampionnatRepository $champRepo
    ): Response {
        return $this->render('home/index.html.twig', [
            'sports' => $sportRepo->findBy([], ['nom' => 'ASC']),
            'championnats' => $champRepo->findBy([], ['nom' => 'ASC']),
        ]);
    }
}
