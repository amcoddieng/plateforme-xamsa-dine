<?php

namespace App\Controller\API;

use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class APIPostController extends AbstractController
{
    #[Route("api/post",)]
    public function index(PostRepository $frepository)
    {
        $ff = $frepository->findAll();
        return $this->json($ff, 200, [], ['groups' => ['post:read']]);
    }
}
