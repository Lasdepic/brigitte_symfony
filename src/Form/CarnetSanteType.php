<?php

namespace App\Form;

use App\Entity\Animal;
use App\Entity\CarnetSante;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CarnetSanteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('vaccins')
            ->add('date_vaccination')
            ->add('date_future_vaccination')
            ->add('animal', EntityType::class, [
                'class' => Animal::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => CarnetSante::class,
        ]);
    }
}
