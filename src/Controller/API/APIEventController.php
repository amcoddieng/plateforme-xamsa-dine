<?php

namespace App\Controller\API;

use App\Repository\EventRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class APIEventController extends AbstractController
{
    #[Route("api/event",)]
    public function index(EventRepository $frepository)
    {
        $ff = $frepository->findAll();
        return $this->json($ff);
    }
}
