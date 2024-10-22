<?php

namespace App\Controller;

use App\Entity\Citation;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CitationController extends AbstractController
{
    #[Route('/citation', name: 'app_citation')]
    public function index(EntityManagerInterface $manager): Response
    {
        $citationRepository = $manager->getRepository(Citation::class);
        $citation = $citationRepository->createQueryBuilder('p')
        ->getQuery()
        ->getResult()
        ;
        return $this->render('dou/index.html.twig', [
            'citation' => $citation,
        ]);
    }
}
