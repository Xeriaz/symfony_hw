<?php

namespace App\Form\Type;

use FOS\UserBundle\Form\Type\RegistrationFormType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FOSRegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('website', UrlType::class)
            ->add('linkedinlink', UrlType::class, ['label' => 'LinkedIn'])
        ;
    }

//    public function configureOptions(OptionsResolver $resolver)
//    {
//        $resolver->setDefault([
//            'website' => '',
//        ]);
//    }

    public function getParent()
    {
        return RegistrationFormType::class;
    }
}

