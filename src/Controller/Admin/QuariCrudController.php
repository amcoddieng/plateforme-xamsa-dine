<?php

namespace App\Controller\Admin;

use App\Entity\Quari;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
class QuariCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Quari::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        $nom = TextField::new('nom','Nom du Qari');

        $imgfields=[
            ImageField::new('image','Image')
            ->setBasePath('upload/img/qari')
            ->setUploadDir('public/upload/img/qari')
            ->setUploadedFileNamePattern('[randomhash].[extension]')
            ->setRequired(true),
        ];

        $fields = array_merge([$nom], $imgfields);

        return $fields;
    }
    
}
