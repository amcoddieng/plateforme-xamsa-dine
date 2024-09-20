<?php

namespace App\Controller;

use App\Entity\Coran;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class PageCoranController extends AbstractController
{
    #[Route('/page/coran', name: 'app_page_coran')]
    public function index(Request $request,EntityManagerInterface $entityManager): Response
    {
        $sourateClick = $request->query->get('numSourate',null);
        // Récupérer le repository de l'entité Coran
        $coranRepository = $entityManager->getRepository(Coran::class);

        // Construire la requête pour récupérer les sourates distinctes
        $sourates = $coranRepository->createQueryBuilder('c')
        ->select('c.souarte , c.numero')
        ->groupBy('c.souarte')  // Grouping by sourate to avoid duplicates
        ->orderBy('c.numero')
        ->getQuery()
        ->getResult();
        // ici je fais la verification si le user a cliquer sur un sourate
        $pages = [];
        if ($sourateClick) {
            $pages = $coranRepository->createQueryBuilder('c')
                ->where('c.numero = :numero')
                ->setParameter('numero', $sourateClick)
                ->orderBy('c.numero_page') // Assurez-vous que les pages sont bien ordonnées
                ->getQuery()
                ->getResult();
        }

        // Renvoyer le résultat à la vue Twig
        return $this->render('page_coran/index.html.twig', [
            'sourates' => $sourates,
            'numSourate' => $sourateClick,
            'pages' => $pages,  // Envoyer les pages à la vue si une sourate est cliquée
        ]);
    }
}
