<?php

namespace App\Controller\API;

use App\Repository\CitationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class APICitationController extends AbstractController
{
    #[Route("api/citation",)]
    public function index(CitationRepository $frepository)
    {
        $ff = $frepository->findAll();
        return $this->json($ff);
    }
}
