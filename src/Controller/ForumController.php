<?php

namespace App\Controller;

use App\Entity\Post;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ForumController extends AbstractController
{
    #[Route('/forum', name: 'app_forum')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $postRepository = $entityManager->getRepository(Post::class);
        $Poste = $postRepository->createQueryBuilder('p')
        ->orderBy('p.date')
        ->getQuery()
        ->getResult();

        return $this->render('forum/index.html.twig', [
            'post' => $Poste,           
        ]);
    }
}
