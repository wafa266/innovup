<?php


namespace App\Form;


use App\Entity\CustomerOrders;
use App\Entity\Product;
use App\Entity\ProviderOrders;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\ChoiceList\ChoiceList;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;


class CustomerOrdersType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('isPaid')
            // ->add('createdAt')
            //->add('updatedAt')
            //->add('deletedAt')
            ->add('products', EntityType::class, [
                'class' => Product::class,
                'expanded' => true,
                'multiple' => true
            ])
            ->add('customer');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => CustomerOrders::class,
            'allow_extra_fields' => true,
            'csrf_protection' => false,
            'validation_groups' => false,
        ]);
    }

}