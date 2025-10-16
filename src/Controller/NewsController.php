<?php

namespace App\Controller;

use App\Repository\EventRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class NewsController extends AbstractController
{
    #[Route('/news', name: 'app_news')]
    public function index(EventRepository $eventRepository): Response
    {
        return $this->render('news/index.html.twig', [
            'controller_name' => 'NewsController',
            'events' => $eventRepository->findAll(),
        ]);
    }
}
