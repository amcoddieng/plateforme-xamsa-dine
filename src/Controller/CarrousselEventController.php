<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CarrousselEventController extends AbstractController
{
    #[Route('/carroussel/event', name: 'app_carroussel_event')]
    public function index(): Response
    {
        return $this->render('carroussel_event/index.html.twig', [
            'controller_name' => 'CarrousselEventController',
        ]);
    }
}
