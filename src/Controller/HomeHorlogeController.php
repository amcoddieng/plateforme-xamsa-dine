<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeHorlogeController extends AbstractController
{
    #[Route('/home/horloge', name: 'app_home_horloge')]
    public function index(): Response
    {
        return $this->render('home_horloge/index.html.twig', [
            'controller_name' => 'HomeHorlogeController',
        ]);
    }
}
