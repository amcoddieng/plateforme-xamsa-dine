<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Quari;

class QariController extends AbstractController
{
    #[Route('/qari', name: 'app_qari')]
    public function index(EntityManagerInterface $entityManager): Response 
    {
        $qari = $entityManager->getRepository(quari::class);
        $quari = $qari->createQueryBuilder('c')
        ->getQuery()
        ->getResult();
    
        // var_dump($quari);die;
        return $this->render('qari/index.html.twig', [
            'qari' => $quari ,
        ]);
    }
}
