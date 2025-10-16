<?php

namespace App\Form;

use App\Entity\Allee;
use App\Entity\Cage;
use App\Entity\Employes;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EmployesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom_employe')
            ->add('prenom_employe')
            ->add('num_employe')
            ->add('sexe_employe')
            ->add('ville_employe')
            ->add('type_poste')
            ->add('cage', EntityType::class, [
                'class' => Cage::class,
                'choice_label' => 'id',
                'multiple' => true,
            ])
            ->add('allee', EntityType::class, [
                'class' => Allee::class,
                'choice_label' => 'id',
                'multiple' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Employes::class,
        ]);
    }
}
