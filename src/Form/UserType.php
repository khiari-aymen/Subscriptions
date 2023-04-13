<?php

namespace App\Form;

use App\Entity\Users;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('cin')
            ->add('email')
            ->add('password')
            ->add('role')
            ->add('birthdate')
            ->add('currentposition')
            ->add('previouslocation')
            ->add('preferredmode')
            ->add('notificationsettings')
            ->add('accessibilityrequirements')
            ->add('loyaltypoints')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Users::class,
        ]);
    }
}
