<?php

namespace App\Form;

use App\Entity\Compte;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SignType extends AbstractType
{
public function buildForm(FormBuilderInterface $builder, array $options): void
{
    $builder
    ->add('email', EmailType::class, [
        'label' => 'Email',
        'attr' => [
            'placeholder' => 'Entrez votre adresse email',
            'class' => 'form-control',
            'style' => 'font-size: .875rem; padding: .375rem .75rem;',
        ],
    ])
    ->add('password', PasswordType::class, [
        'label' => 'Mot de passe',
        'attr' => [
            'placeholder' => 'Entrez votre mot de passe',
            'class' => 'form-control',
            'style' => 'font-size: .875rem; padding: .375rem .75rem;',
        ],
    ])
    ->add('prenom', TextType::class, [
        'label' => 'Prénom',
        'attr' => [
            'placeholder' => 'Entrez votre prénom',
            'class' => 'form-control',
            'style' => 'font-size: .875rem; padding: .375rem .75rem;',
        ],
    ])
    ->add('nom', TextType::class, [
        'label' => 'Nom',
        'attr' => [
            'placeholder' => 'Entrez votre nom',
            'class' => 'form-control',
            'style' => 'font-size: .875rem; padding: .375rem .75rem;',
        ],
    ])
    ->add('submit', SubmitType::class, [
        'label' => 'Valider',
        'attr' => [
            'class' => 'btn btn-custom w-100',
            'style' => 'background-color: #28a745; color: white; font-size: .875rem;',
        ],
    ]);
}

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Compte::class,
        ]);
    }
}
