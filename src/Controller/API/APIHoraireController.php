<?php
namespace App\Controller\API;

use App\Repository\CompteRepository;
use App\Repository\HorairePriereRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

 class APIHoraireController extends AbstractController{
    #[Route("api/horaire")]
    public function index( HorairePriereRepository $repository) {
        $f = $repository->findAll();
        return $this->json($f);
        }

        #[Route("api/compte")]
    public function index1( CompteRepository $repository) {
        $f = $repository->findAll();
        return $this->json($f);
        }
 }