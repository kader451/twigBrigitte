<?php

namespace App\Form;

use App\Entity\Adoptant;
use App\Entity\Animals;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

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
            ->add('adoptable')
            ->add('dateArrive')
            ->add('adoptant', EntityType::class, [
                'class' => Adoptant::class,
                'choice_label' => 'nom',
            ])
        ;;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Animals::class,
        ]);
    }
}
