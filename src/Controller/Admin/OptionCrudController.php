<?php

namespace App\Controller\Admin;

use App\Entity\Option;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;

class OptionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Option::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('galerie')->hideOnForm(),
            TextField::new('caracteristiques')->hideOnForm(),
            TextField::new('equipements')->hideOnForm(),
            TextField::new('voiture')->hideOnForm(),
        ];
    }
}
