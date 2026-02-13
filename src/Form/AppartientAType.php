<?php

namespace App\Form;

use App\Entity\AppartientA;
use App\Entity\Epreuve;
use App\Entity\Sport;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AppartientAType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('sport', EntityType::class, [
                'class' => Sport::class,
                'choice_label' => 'nom',
            ])
            ->add('epreuve', EntityType::class, [
                'class' => Epreuve::class,
                'choice_label' => 'nom',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => AppartientA::class,
        ]);
    }
}
