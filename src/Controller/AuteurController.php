<?php

namespace App\Controller;

use App\Entity\Auteur;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AuteurController extends AbstractController
{
    #[Route('/auteur', name: 'app_auteur')]
    public function index(EntityManagerInterface $entityManagerInterface): Response
    {
        $auteurRepository = $entityManagerInterface->getRepository(Auteur::class);
        $auteurs = $auteurRepository->createQueryBuilder('c')
        ->getQuery()
        ->getResult();
        return $this->render('auteur/index.html.twig', [
            'auteurs' => $auteurs,
        ]);
    }
}
