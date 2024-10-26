<?php

namespace App\Controller\API;

use App\Repository\AuteurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class APIAuteurController extends AbstractController
{
    #[Route("api/auteur",methods:["GET"])]
    public function index(AuteurRepository $frepository)
    {
        $ff = $frepository->findAll();
        return $this->json($ff, 200, [], ['groups' => ['compte:read']]);
    }
}
