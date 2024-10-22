<?php

namespace App\Controller\Admin;

use App\Entity\Doua;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class DouaCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Doua::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
            ->onlyOnIndex(),
            TextField::new('titre','Titre du doua'),
            TextEditorField::new('contenuAr','contenu en arabe'),
            TextEditorField::new('contenuFr','contenu en francais'),
            TextEditorField::new('signification','signification'),
            DateField::new('date_ajout','date d\'ajout'),
        ];
    }
    
}
