<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 26/09/2018
 * Time: 09:51
 */

namespace AppBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomStage', TextType::class)
            ->add('dure', TextType::class)
            ->add('skills', TextType::class)
            ->add('description', TextType::class)
            ->add('image', FileType::class, array('data_class' => null) );

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'appBundle\Entity\Stage',
        ]);
    }
}