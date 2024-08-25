<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
class ConnexionController extends AbstractController
{
    #[Route('/connexion', name: 'app_connexion')]
    public function index(AuthenticationUtils $auth): Response
    {
        // on recupere les erreur
        $error = $auth->getLastAuthenticationError();
        // on recupere l'Email
        $email = $auth->getLastUsername();
        return $this->render('connexion/index.html.twig', [
            'error' => $error,
            'email' => $email,
        ]);
    }
    #[Route('/logout',name:'app_logout')]
    public function logout(){
        $error="";
        $email="";
        return $this->render('connexion/index.html.twig', [
            'error' => $error,
            'email' => $email,
        ]);
    }
}
