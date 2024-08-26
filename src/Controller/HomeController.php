<?php

namespace App\Controller;

use App\Entity\HorairePriere;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(Request $request, EntityManagerInterface $entityManager, SessionInterface $session): Response
    {
        $Region = $request->query->get('region', null);
        $isoCode = $request->query->get('isoCode', null);

        // Si le code ISO est dans l'URL, on le stocke en session
        if ($isoCode) {
            $session->set('isoCode', $isoCode);
        } else {
            // Sinon, on tente de le récupérer depuis la session
            $isoCode = $session->get('isoCode');
        }

        $horaireRepository = $entityManager->getRepository(HorairePriere::class);
        $horaire = [];

        if ($Region) {
            $horaire = $horaireRepository->createQueryBuilder('p')
                ->where('p.region = :region')
                ->setParameter('region', $Region)
                ->setMaxResults(10)
                ->getQuery()
                ->getResult();
        } elseif ($isoCode) {
            $horaire = $horaireRepository->createQueryBuilder('p')
                ->where('p.iso3166 = :region')
                ->setParameter('region', $isoCode)
                ->setMaxResults(10)
                ->getQuery()
                ->getResult();
        }

        if (!$horaire) {
            $this->addFlash('warning', 'Aucun horaire de prière trouvé pour cette région.');
        }

        return $this->render('home/index.html.twig', [
            'horaires' => $horaire,
            'Region' => $Region,
            'isoCode' => $isoCode,
        ]);
    }
}
