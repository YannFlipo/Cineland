<?php

namespace App\Form;

use App\Entity\Acteur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class ActeurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomPrenom')
            ->add('dateNaissance', DateType::class, array(
                   'label' => 'Date de naissance',
                   'years' => range(date('1900'), date('Y')),
                   'required' => true))
            ->add('nationalite')
            ->add('films')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Acteur::class,
        ]);
    }
}
