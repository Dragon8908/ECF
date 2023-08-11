<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FiltreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('minPrice', NumberType::class, ['label' => false,'required' => false,'attr' => ['placeholder' => 'Prix min']])
        ->add('maxPrice', NumberType::class, ['label' => false,'required' => false,'attr' => ['placeholder' => 'Prix max']])
        ->add('minKm', NumberType::class, ['label' => false,'required' => false,'attr' => ['placeholder' => 'Km min']])
        ->add('maxKm', NumberType::class, ['label' => false,'required' => false,'attr' => ['placeholder' => 'Km max']])
        ->add('minYear', NumberType::class, ['label' => false,'required' => false,'attr' => ['placeholder' => 'Année min']])
        ->add('maxYear', NumberType::class, ['label' => false,'required' => false,'attr' => ['placeholder' => 'Année max']]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
