<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeCoranController extends AbstractController
{
    #[Route('/home/coran', name: 'app_home_coran')]
    public function index(): Response
    {
        return $this->render('home_coran/index.html.twig', [
            'controller_name' => 'HomeCoranController',
        ]);
    }
}
