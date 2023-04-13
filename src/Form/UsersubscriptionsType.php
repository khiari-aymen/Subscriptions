<?php

namespace App\Form;

use App\Entity\Users;
use App\Entity\Subscriptions;
use App\Entity\Usersubscriptions;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use App\Form\DataTransformer\DateTimeTransformer;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class UsersubscriptionsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('user', EntityType::class, [
                'class' => Users::class,
                'choice_label' => 'CIN',
                'placeholder' => 'Choose a user',
                'required' => true,
            ])
            ->add('subscriptionid', EntityType::class, [
                'class' => Subscriptions::class,
                'choice_label' => 'name',
            ])
            ->add('startDate', DateTimeType::class, [
                'widget' => 'single_text',
                'html5' => false,
                'format' => 'dd-MM-yyyy',
                'attr' => [
                    'class' => 'datetimepicker',
                ],
            ])
            ->add('endDate', DateTimeType::class, [
                'widget' => 'single_text',
                'html5' => false,
                'format' => 'dd-MM-yyyy',
                'attr' => [
                    'class' => 'datetimepicker',
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Usersubscriptions::class,
        ]);
    }
}
