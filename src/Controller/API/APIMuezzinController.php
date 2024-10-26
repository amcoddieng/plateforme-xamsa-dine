<?php

namespace App\Controller\API;

use App\Repository\MuezzinRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class APIMuezzinController extends AbstractController
{
    #[Route("api/muezzin",)]
    public function index(MuezzinRepository $frepository)
    {
        $ff = $frepository->findAll();
        return $this->json($ff);
    }
}
