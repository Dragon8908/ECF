<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id','Identifiant')->hideOnForm(),
            TextField::new('email')->hideOnForm(),
            TextField::new('password')->hideOnIndex()->hideOnForm(),
            TextField::new('nom', 'Nom')->hideOnForm(),
            TextField::new('prenom', 'Prénom')->hideOnForm(),
        ];
    }
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setDefaultSort(['id'=>'DESC'])
            ->setPageTitle('index', 'Utilisateurs ayant crée un compte');
    }
    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->disable(Action::DELETE, Action::NEW)
            ->disable(Action::DELETE, Action::EDIT)
            ->disable(Action::DELETE, Action::DELETE);
    }
    
}