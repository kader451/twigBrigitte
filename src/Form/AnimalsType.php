<?php

namespace App\Form;

use App\Entity\Adoptant;
use App\Entity\Animals;
use App\Entity\Race;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class AnimalsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('sexe')
            ->add('dataNaissance')
            ->add('age')
            ->add('numeroIdentification')
            ->add('adoptable', CheckboxType::class, [
                'required' => false,
                'label' => 'Adoptable'
            ])
            ->add('dateArrive')
            ->add('adoptant', EntityType::class, [
                'class' => Adoptant::class,
                'required' => false,
                'choice_label' => 'nom',
                'placeholder' => 'Choisir un adoptant'
            ])
            ->add('race', EntityType::class, [
                'class' => Race::class,
                'choice_label' => 'nom',
                'required' => false,
                'placeholder' => 'choisir le type animal',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Animals::class,
        ]);
    }
}
