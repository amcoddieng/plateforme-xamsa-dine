<?php
namespace App\Controller\Admin;

use App\Entity\Livre;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class LivreCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Livre::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('titre', 'Titre du livre'),
            TextField::new('description', 'Description du livre'),
            AssociationField::new('auteur', 'Auteur du livre'), // Champ de sélection pour l'auteur
            NumberField::new('numero_page','numero de la page'),
            ImageField::new('image','image')
            ->setBasePath('upload/img/auteur')
            ->setUploadDir('public/upload/img/auteur')
            ->setUploadedFileNamePattern('[randomhash].[extension]')
            ->setRequired(true),
        ];
    }
}
