<?php

namespace App\Controller\API;

use App\Repository\LivreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class APILivreController extends AbstractController
{
    #[Route("api/livre",)]
    public function index(LivreRepository $frepository)
    {
        $ff = $frepository->findAll();
        return $this->json($ff, 200, [], ['groups' => ['livre:read']]);
    }
}
