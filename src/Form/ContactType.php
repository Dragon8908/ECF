<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Validator\Constraints\NotBlank;


class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, ['attr' => ['class' => 'form-control mb-3 form-title_style text-primary'], 'label' => false])
            ->add('prenom', TextType::class, ['attr' => ['class' => 'form-control mb-3 form-title_style text-primary'], 'label' => false])
            ->add('email', EmailType::class, ['attr' => ['class' => 'form-control mb-3'], 'constraints' => [ new NotBlank(['message' => 'Veuillez saisir une adresse email'])], 'label' => false])
            ->add('telephone', TextType::class, ['attr' => ['class' => 'form-control mb-3 form-title_style text-primary'], 'label' => false])
            ->add('sujet', TextType::class, ['attr' => ['class' => 'form-control mb-3 form-title_style text-primary'], 'label' => false])
            ->add('message', TextareaType::class, ['attr' => ['class' => 'form-control mb-3 form-title_style text-primary'], 'label' => false]);
        }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }

   
}