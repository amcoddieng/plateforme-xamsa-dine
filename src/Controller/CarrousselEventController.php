<?php

namespace App\Controller;

use App\Entity\Event;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CarrousselEventController extends AbstractController
{
    #[Route('/carroussel/event', name: 'app_carroussel_event')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $eventRepository = $entityManager->getRepository(Event::class);
        $event = $eventRepository->createQueryBuilder('p')
            ->setMaxResults(1)
            ->getQuery()
            ->getResult();
        return $this->render('carroussel_event/index.html.twig', [
            'events' => $event,
        ]);
    }
}
