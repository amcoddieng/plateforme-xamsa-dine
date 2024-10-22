<?php

namespace App\Controller;

use App\Entity\Doua;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DouController extends AbstractController
{
    #[Route('/dou', name: 'app_dou')]
    public function index(EntityManagerInterface $manager): Response
    {
        $douaRepository = $manager->getRepository(Doua::class);
        $doua = $douaRepository->createQueryBuilder('p')
        ->getQuery()
        ->getResult()
        ;
        return $this->render('dou/index.html.twig', [
            'doua' => $doua,
        ]);
    }
}
