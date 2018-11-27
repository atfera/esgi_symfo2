<?php

namespace App\Form;

use App\Entity\Issues;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class IssuesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom_issue')
            ->add('description')
            ->add('userId')
            ->add('stateId')
            ->add('issueTypeId')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Issues::class,
        ]);
    }
}
