<?php

namespace App\Controller\API;

use App\Repository\CompteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class APICompteController extends AbstractController
{
    #[Route("api/compte", methods: ["GET"])]
    public function index(CompteRepository $frepository)
    {
        $ff = $frepository->findAll();
        return $this->json($ff, 200, [], ['groups' => ['compte:read']]);
    }
}
