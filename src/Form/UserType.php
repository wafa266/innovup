<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder,array $options)
    {
        $builder
            ->add('firstName')
            ->add('lastName')
            ->add('email')
            ->add('password')
            ->add('phone')
            ->add('roles',ChoiceType::class , [
                'choices' =>[
                'utilisateur' => 'ROLE_USER',
                'magasinier'  => 'ROLE_MAG',
                'ROLE_purchasing_manager'  => 'ROLE_purchasing_manager',
                'ROLE_sales_manager' =>'ROLE_sales_manager'],
             'expanded'  => true,
                'multiple'  => true,])
            ->add('createdAt')
            ->add('updatedAt')
            ->add('deletedAt')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
