<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class LireSourateController extends AbstractController
{
    #[Route('/lire/sourate', name: 'app_lire_sourate')]
    public function index(): Response
    {
        return $this->render('lire_sourate/index.html.twig', [
            'controller_name' => 'LireSourateController',
        ]);
    }
}
