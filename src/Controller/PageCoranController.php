<?php
// PageCoranController.php

namespace App\Controller;

use App\Entity\Coran;
use App\Entity\QranAudio;
use App\Entity\Quari;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class PageCoranController extends AbstractController
{
    #[Route('/page/coran', name: 'app_page_coran')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $sourateClick = $request->query->get('numSourate', null);
        $IDqari = $request->query->get('IDqari', null);
        
        // Récupérer le repository de l'entité Coran
        $coranRepository = $entityManager->getRepository(Coran::class);
        
        // Construire la requête pour récupérer les sourates distinctes
        $sourates = $coranRepository->createQueryBuilder('c')
            ->select('c.souarte , c.numero')
            ->groupBy('c.souarte')  // Groupee par sourate pour eviter les duplications
            ->orderBy('c.numero')
            ->getQuery()
            ->getResult();

        // recuperation de l'audio par defaut ( FATIH)
        $qariRepository = $entityManager->getRepository(Quari::class);
        $qari = $qariRepository->createQueryBuilder('c')
            ->getQuery()
            ->getResult();

        // recuperer le qari par defaut et ses sourate (sudais)
        $qranRepository = $entityManager->getRepository(QranAudio::class);
        $audio = $qranRepository->createQueryBuilder('c')
        ->where('c.qari = :nom')
        ->setParameter('nom', '1')
        ->orderBy('c.numero')
        ->getQuery()
        ->getResult();
        // Si la requête est en AJAX, renvoyer les pages correspondantes à la sourate
        if ($request->isXmlHttpRequest() && $sourateClick) {
            $pages = $coranRepository->createQueryBuilder('c')
            ->select('c.image, c.numero_page')
            ->where('c.numero = :numero')
            ->setParameter('numero', $sourateClick)
            ->orderBy('c.numero_page')
            ->getQuery()
            ->getResult();

            // on recupere le son du sourate
            $audioClick = $qranRepository->createQueryBuilder('c')
            ->select('c.audio')
            ->where('c.qari = :nom')
            ->andWhere('c.numero = :num')
            ->setParameter('nom', $IDqari) 
            ->setParameter('num', $sourateClick)
            ->orderBy('c.numero')
            ->getQuery()
            ->getResult();
            
            // Retourner les pages en format JSON
            return new JsonResponse([
                'pages' => $pages,
                'audioClick' => $audioClick
            ]);
        }
        
        // Sinon, renvoyer la vue Twig
        return $this->render('page_coran/index.html.twig', [
            'sourates' => $sourates,
            'numSourate' => $sourateClick,
            'qaris' => $qari,
            'audio' => $audio,
        ]);
    }
}
