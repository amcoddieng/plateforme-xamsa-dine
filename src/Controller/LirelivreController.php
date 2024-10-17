<?php

namespace App\Controller;

use App\Entity\Auteur;
use App\Entity\Livre;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class LirelivreController extends AbstractController
{
    #[Route('/lirelivre{id_livre}/{id_auteur}', name: 'app_lirelivre')]
    public function index(string $id_livre,$id_auteur,EntityManagerInterface $entityManager): Response
    {
        $auteur = $entityManager->getRepository(Auteur::class)->find($id_auteur);
        $livre = $entityManager->getRepository(Livre::class);
        $pageslivre = $livre->createQueryBuilder('c')
            ->select('c.image, c.numero_page')
            ->where('c.titre = :titre')
            ->setParameter('titre', $id_livre)
            ->orderBy('c.numero_page')
            ->getQuery()
            ->getResult();
        return $this->render('lirelivre/index.html.twig', [
            'titre' => $id_livre,
            'auteur' => $auteur,
            'livre' => $pageslivre,
        ]);
    }
}