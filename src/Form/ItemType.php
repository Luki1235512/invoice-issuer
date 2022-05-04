<?php

namespace App\Form;

use App\Entity\InvoiceItem;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ItemType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'attr' => array(
                    'class' => 'bg-transparent block border-b-2 w-full h-10 text-2xl outline-none',
                    'placeholder' => ''
                )
            ])
            // ->add('order_date')
            ->add('unitPrice', NumberType::class, [
                'attr' => array(
                    'class' => 'bg-transparent block border-b-2 w-full h-10 text-2xl outline-none',
                    'placeholder' => ''
                )
            ])
            ->add('quantity', NumberType::class, [
                'attr' => array(
                    'class' => 'bg-transparent block border-b-2 w-full h-10 text-2xl outline-none',
                    'placeholder' => ''
                )
            ])
            ->add('tax', NumberType::class, [
                'attr' => array(
                    'class' => 'bg-transparent block border-b-2 w-full h-10 text-2xl outline-none',
                    'placeholder' => ''
                )
            ])
            // ->add('items')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => InvoiceItem::class,
        ]);
    }
}
