<?php

namespace App\Controller\Admin;

use App\Entity\Muezzin;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichFileType;

class MuezzinCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Muezzin::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nom','Nom du muezzin'),
            TextField::new('mosque','mosque'),
            TextField::new('audioFile')
            ->setFormType(VichFileType::class)  // Utilisation de VichFileType pour gérer l'upload
            ->setLabel('Fichier audio (MP3, WAV)')
            ->onlyOnForms(), // Champ visible uniquement lors de l'ajout ou de la modification
        TextField::new('audio')
            ->setLabel('Fichier audio du sourate') // Afficher le fichier audio actuel
            ->onlyOnIndex(), // Visible uniquement dans la liste
        ];
    }
    
}
