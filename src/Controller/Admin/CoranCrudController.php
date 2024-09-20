<?php

namespace App\Controller\Admin;

use App\Entity\Coran;
use Attribute;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CoranCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Coran::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        
        $fields=[
            ImageField::new('image','Image')
            ->setBasePath('upload/img/coran')
            ->setUploadDir('public/upload/img/coran')
            ->setUploadedFileNamePattern('[randomhash].[extension]')
            ->setRequired(true),
        ];
        $sourate = TextField::new('souarte','Sourate');
        $numero = NumberField::new('numero','numero du sourate');
        $numeroPage = NumberField::new('numero_page','Numero de la page');
        $langue = TextField::new('langue','Langue');

        $fields[] = $sourate; 
        $fields[] = $numero; 
        $fields[] = $numeroPage; 
        $fields[] = $langue; 
        return $fields;
    }
    
}
