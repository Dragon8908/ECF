<?php

namespace App\Form;

use App\Entity\Temoignage;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class TemoignageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom',TextType::class, ['attr' => ['class' => 'form-control mb-3'], 'label' => false])
            ->add('commentaire', TextType::class, ['attr' => ['class' => 'form-control mb-3 form-title_style text-primary'], 'label' => false])
            ->add('note', ChoiceType::class, [
                'placeholder' => "Votre note",
                'attr' => [
                    'class' => 'rounded-sm pl-0 xs:pr-3 selector-booking',
                ],
                'choices' => [
                    '0' => 1,
                    '0.5' => 2,
                    '1' => 3,
                    '1.5' => 4,
                    '2' => 5,
                    '2.5' => 6,
                    '3' => 7,
                    '3.5' => 8,
                    '4' => 9,
                    '4.5'=> 10,
                    '5' => 11,
                ],
                'multiple' => false,
                'expanded' => false,
                "required" => true
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Temoignage::class,
        ]);
    }
}
