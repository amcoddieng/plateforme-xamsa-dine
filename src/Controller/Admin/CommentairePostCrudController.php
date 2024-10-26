<?php

namespace App\Controller\Admin;

use App\Entity\CommentairePost;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CommentairePostCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return CommentairePost::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->onlyOnIndex(),
            TextField::new('C_post','le post lier au commentaire')->onlyOnIndex(),
            TextEditorField::new('contenu_c','le commentaire')->onlyOnIndex(),
            TextField::new('auteur_c','l\'auteur du commentaire')->onlyOnIndex(),
            TextField::new('follow','mention j\'aime')->onlyOnIndex(),

        ];
    }
    
}
