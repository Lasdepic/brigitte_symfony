<?php

namespace App\Form;

use App\Entity\Allee;
use App\Entity\Cage;
use App\Entity\Employes;
use App\Entity\Fonctionnalites;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('num_cage')
            ->add('fonctionnalites', EntityType::class, [
                'class' => Fonctionnalites::class,
                'choice_label' => 'id',
                'multiple' => true,
            ])
            ->add('allee', EntityType::class, [
                'class' => Allee::class,
                'choice_label' => 'id',
            ])
            ->add('employes', EntityType::class, [
                'class' => Employes::class,
                'choice_label' => 'id',
                'multiple' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Cage::class,
        ]);
    }
}
