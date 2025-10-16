<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\ActivityRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class PlanController extends AbstractController
{
    #[Route('/plan', name: 'app_plan')]
    public function index(ActivityRepository $activityRepository): Response
    {
        return $this->render('plan/index.html.twig', [
            'controller_name' => 'PlanController',
             'activities' => $activityRepository->findAll(),
        ]);
    }
}
