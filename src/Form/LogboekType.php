<?php

namespace App\Form;

use App\Entity\Logboek;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LogboekType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('begeleidingsbrief')
            ->add('datum')
            ->add('aantalm3')
            ->add('laadlocatie')
            ->add('tijdvertrek')
            ->add('bestemming')
            ->add('evenement')
            ->add('user_id')
            ->add('chauffeur')
            ->add('truck')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Logboek::class,
        ]);
    }
}
