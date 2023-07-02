<?php

namespace App\Controller\Admin;

use App\Entity\Voiture;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;

class VoitureCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Voiture::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('nom')->hideOnForm(),
            IntegerField::new('prix')->hideOnForm(),
            IntegerField::new('annee')->hideOnForm(),
            IntegerField::new('km')->hideOnForm(),
            TextField::new('photo')->hideOnForm(),
        ];
    }
}
