<?php
namespace App\Controller\Admin;

use App\Entity\QranAudio;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichFileType;

class QranAudioCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return QranAudio::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('sourate'),
            NumberField::new('numero'),
            AssociationField::new('qari','recitateur'),
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
