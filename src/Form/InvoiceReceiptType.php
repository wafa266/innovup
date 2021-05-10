<?php

namespace App\Form;

use App\Entity\InvoiceReceipt;
use App\Entity\Product;
use App\Entity\Provider;
use App\Entity\ProviderOrders;
use phpDocumentor\Reflection\Types\Boolean;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\ChoiceList\ChoiceList;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class InvoiceReceiptType  extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
           // ->add('createdAt')
            //->add('updatedAt')
            //->add('deletedAt')
            ->add('providerOrders',  EntityType::class, [
               'class'     => ProviderOrders::class,
               'expanded'  => true,
                'multiple'  => false
           ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => InvoiceReceipt::class,
            'allow_extra_fields' => true,
            'csrf_protection' => false,
            'validation_groups' => false,
        ]);
    }
}
