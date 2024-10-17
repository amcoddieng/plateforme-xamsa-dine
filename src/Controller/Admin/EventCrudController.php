<?php

namespace App\Controller\Admin;

use App\Entity\Event;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class EventCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Event::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nom','Nom de l\'evennement'),
            TextEditorField::new('description','Description'),
            DateField::new('date_event','date de l\'evennement'),
            DateField::new('date_ajout','date mise a jour de l\'evennement')->setFormTypeOption('data',new \DateTime()),
            TextField::new('lieu','Lieu'),
            TextField::new('video','lien de la video')->setRequired(false),
            ImageField::new('image','image')
            ->setBasePath('upload/img/event')
            ->setUploadDir('public/upload/img/event')
            ->setUploadedFileNamePattern('[randomhash].[extension]')
            ->setRequired(true),
            BooleanField::new('passee','l\'evennement est passee ou pas'),
        ];
    }
}
