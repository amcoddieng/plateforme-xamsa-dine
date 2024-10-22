<?php

namespace App\Controller\Admin;

use App\Entity\Compte;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CompteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Compte::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id','identifiant')->hideOnForm(),
            TextField::new('prenom','Prenom'),
            TextField::new('nom','Nom'),
            TextField::new('email','E-mail'),
            ArrayField::new('roles','Roles'),
        ];
    }
    
}
