<?php

namespace App\Controller\API;

use App\Repository\DouaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class APIDouaController extends AbstractController
{
    #[Route("api/doua",)]
    public function index(DouaRepository $frepository)
    {
        $ff = $frepository->findAll();
        return $this->json($ff);
    }
}
