<?php

namespace App\Form;

use App\Entity\Voiture;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Option;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Validator\Constraints\NotBlank;

class VoitureType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom',TextType::class, ['required' => true,'attr' => ['class' => 'form-control mb-3','placeholder' => 'Entrez le nom du véhicule'], 'label' => false])
            ->add('prix', IntegerType::class, ['required' => true,'attr' => ['class' => 'form-control mb-3','placeholder' => 'Entrez le prix du véhicule'], 'label' => false])
            ->add('annee', IntegerType::class, ['required' => true,'attr' => ['class' => 'form-control mb-3','placeholder' => 'Entrez l\'année de mise ne circulation du véhicule'], 'label' => false])
            ->add('km', IntegerType::class, ['required' => true,'attr' => ['class' => 'form-control mb-3','placeholder' => 'Entrez le kilométrage du véhicule'], 'label' => false])
            ->add("fichier", FileType::class,["required" => true,"data_class" => null,"constraints" => [new NotBlank(["message" => "Vous devez ajouter une image !"]),
                    new File([
                        'maxSize' => "5M",
                        'mimeTypes' => [
                            'image/jpeg',
                            'image/png',
                            'image/svg',
                            'image/jpg',
                            'image/webp',
                            'image/avif'
                        ],
                        'mimeTypesMessage' => 'Veuillez proposer une image valide'
                    ])
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Voiture::class,
        ]);
    }
}
