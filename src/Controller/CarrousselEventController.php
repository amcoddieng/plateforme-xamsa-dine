<?php

namespace App\Controller;

use App\Entity\Event;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CarrousselEventController extends AbstractController
{
    #[Route('/carroussel/event/{id_event?}', name: 'app_carroussel_event')]
    public function index(?int $id_event, EntityManagerInterface $entityManager): Response
    {
        $eventRepository = $entityManager->getRepository(Event::class);

        // Détail d'un event spécifique
        if ($id_event) {
            $event = $eventRepository->createQueryBuilder('p')
                ->where('p.id = :id')
                ->setParameter('id', $id_event)
                ->getQuery()
                ->getOneOrNullResult(); // Récupérer un seul événement

            return $this->render('carroussel_event/detail.html.twig', [
                'event' => $event,
            ]);
        }

        // Liste des événements
        $events = $eventRepository->createQueryBuilder('p')
            ->getQuery()
            ->getResult(); // Récupérer tous les événements

        return $this->render('carroussel_event/events.html.twig', [
            'events' => $events,
        ]);
    }
}
