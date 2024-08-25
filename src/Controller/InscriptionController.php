<?php

namespace App\Controller;
use App\Entity\Compte;
use App\Form\SignType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ORM\EntityManagerInterface;

class InscriptionController extends AbstractController
{
    #[Route('/inscription', name: 'app_inscription')]
    public function index(Request $req ,EntityManagerInterface $entityManagerInterface ,UserPasswordHasherInterface $passwordhasher): Response
    {
        // creation d'un compte 
        $user = new Compte();
        // creation du formulaire
        $form = $this->createForm(SignType::class,$user);
        // cette methode me permet de gerer que la formulaire a ete soumis
        $form->HandleRequest($req);
        // verifions si le formulaire est soumis pour faire les traiement necessaire
        if($form->isSubmitted() && $form->isValid()){
            // on recupere les donnees
            $user = $form->getdata();
            // recupere le mdp et on le hash
            $mdp = $user->getPassword();
            $mdp_hasher = $passwordhasher->hashPassword($user,$mdp);
            $user->setPassword($mdp_hasher);
            $entityManagerInterface->persist($user);
            $entityManagerInterface->flush();
            
            // Ajout d'un message flash pour informer l'utilisateur
            $this->addFlash('success', 'Inscription réussie !');

            // Redirection vers la page de connexion
            return $this->redirectToRoute('app_connexion');
        }
        // on renvoie le formulaire au vue
        return $this->render('inscription/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
