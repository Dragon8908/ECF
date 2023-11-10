<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\Filtre;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
class FiltreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('prixmin', NumberType::class, ['label' => false,'required' => false,'attr' => ['placeholder' => 'Prix min']])
        ->add('prixmax', NumberType::class, ['label' => false,'required' => false,'attr' => ['placeholder' => 'Prix max']])
        ->add('anneemin', NumberType::class, ['label' => false,'required' => false,'attr' => ['placeholder' => 'Année min']])
        ->add('anneemax', NumberType::class, ['label' => false,'required' => false,'attr' => ['placeholder' => 'Année max']])
        ->add('kmmin', NumberType::class, ['label' => false,'required' => false,'attr' => ['placeholder' => 'Km min']])
        ->add('kmmax', NumberType::class, ['label' => false,'required' => false,'attr' => ['placeholder' => 'Km max']]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Filtre::class,
            'method' => 'GET',
            'csrf_protection' => false
        ]);
    }
}
