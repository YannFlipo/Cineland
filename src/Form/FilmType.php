<?php

namespace App\Form;

use App\Entity\Film;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class FilmType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre')
            ->add('duree')
            ->add('dateSortie', DateType::class, array(
                   'label' => 'Date de Sortie',
                   'years' => range(date('1900'), date('Y')),
                   'required' => true))
            ->add('note')
            ->add('ageMinimal')
            ->add('acteurs')
            ->add('genre')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Film::class,
        ]);
    }
}
