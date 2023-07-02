<?php

namespace App\Controller\Admin;

use App\Entity\Contact;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ContactCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Contact::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nom', 'Nom')->hideOnForm(),
            TextField::new('prenom', 'Prénom')->hideOnForm(),
            TextField::new('telephone', 'Télephone')->hideOnForm(),
            TextField::new('email')->hideOnForm(),
            TextField::new('message', 'Message')->hideOnForm(),
        ];
    }
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setDefaultSort(['nom'=>'ASC', 'prenom' => 'ASC']);
    }
    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->disable(Action::DELETE, Action::NEW);
    }
}