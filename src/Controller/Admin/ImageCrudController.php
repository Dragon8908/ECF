<?php

namespace App\Controller\Admin;

use App\Entity\Image;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ImageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Image::class;
    }
   

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('titre', 'Titre'),
            TextareaField::new('description'),
            TextField::new('image')->setFormType(VichImageType::class)->hideOnIndex(),
            ImageField::new('fichier', 'galeries')->setBasePath('/uploads/galeries')->onlyOnIndex(),
                
        ]; 
    }
    public function configureCrud(Crud $crud): Crud
    {
        return $crud    
            ->setPageTitle('new', 'Attention à la taille de la photo importer');
    }
    
}
