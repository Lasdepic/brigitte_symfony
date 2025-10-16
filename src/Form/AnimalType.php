<?php

namespace App\Form;

use App\Entity\Animal;
use App\Entity\Cage;
use App\Entity\CarnetSante;
use App\Entity\Maladie;
use App\Entity\Menu;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AnimalType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('date_naissance')
            ->add('description')
            ->add('num_identification')
            ->add('sexe')
            ->add('date_arrivee')
            ->add('est_adoptable')
            ->add('maladies', EntityType::class, [
                'class' => Maladie::class,
                'choice_label' => 'id',
                'multiple' => true,
            ])
            ->add('carnetSante', EntityType::class, [
                'class' => CarnetSante::class,
                'choice_label' => 'id',
            ])
            ->add('menu', EntityType::class, [
                'class' => Menu::class,
                'choice_label' => 'id',
            ])
            ->add('cage', EntityType::class, [
                'class' => Cage::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Animal::class,
        ]);
    }
}
