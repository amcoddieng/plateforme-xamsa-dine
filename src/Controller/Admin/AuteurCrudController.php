<?php

namespace App\Controller\Admin;

use App\Entity\Auteur;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class AuteurCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Auteur::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            NumberField::new('id','id'),
            TextField::new('nom','nom de l\'ecrvain'),
            ImageField::new('image','image de l\'auteur')
            ->setBasePath('upload/img/auteur')
            ->setUploadDir('public/upload/img/auteur')
            ->setUploadedFileNamePattern('[randomhash].[extension]')
            ->setRequired(true),
            TextField::new('info','info sur l\'ecrivain'),
            
        ];
    }
    
}
