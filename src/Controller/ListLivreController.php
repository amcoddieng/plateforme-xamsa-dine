<?php

namespace App\Controller;

use App\Entity\Auteur;
use App\Entity\Livre;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ListLivreController extends AbstractController
{
    #[Route('/list/livre{id}', name: 'app_list_livre')]
    public function index(int $id,EntityManagerInterface $entityManager): Response
    {
        // $livreRepository = $entityManager->getRepository(Livre::class);
        $auteur = $entityManager->getRepository(Auteur::class)->find($id);

        if (!$auteur) {
            throw $this->createNotFoundException('Auteur non trouvé.');
        }
        
         // Récupérer tous les livres de cet auteur
         $livres = $entityManager->getRepository(Livre::class)->findBy(['auteur' => $auteur]);

        
        return $this->render('list_livre/index.html.twig', [
            'auteur' => $auteur,
            'livres' => $livres,
        ]);
    }
}
