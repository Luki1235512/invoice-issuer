<?php

namespace App\Form;

use App\Entity\Invoice;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InvoiceFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            // ->add('title', TextType::class, [
            //     'attr' => array(
            //         'class' => 'bg-transparent block border-b-2 w-full h-20 text-6xl outline-none',
            //         'placeholder' => 'Title'
            //     ),
            //     'label' => false,
            //     'required' => false
            // ])

            ->add('title', TextType::class, [
                'attr' => array(
                    'class' => 'bg-transparent block border-b-2 w-full h-10 text-2xl outline-none',
                    'placeholder' => ''
                )
            ])
            ->add('receiverName', TextType::class, [
                'attr' => array(
                    'class' => 'bg-transparent block border-b-2 w-full h-10 text-2xl outline-none',
                    'placeholder' => ''
                    )
            ])
            ->add('receiverStreet', TextType::class, [
                'attr' => array(
                    'class' => 'bg-transparent block border-b-2 w-full h-10 text-2xl outline-none',
                    'placeholder' => ''
                )
            ])
            ->add('receiverZIPcode', TextType::class, [
                'attr' => array(
                    'class' => 'bg-transparent block border-b-2 w-full h-10 text-2xl outline-none',
                    'placeholder' => ''
                )
            ])

            ->add('senderName', TextType::class, [
                'attr' => array(
                    'class' => 'bg-transparent block border-b-2 w-full h-10 text-2xl outline-none',
                    'placeholder' => ''
                )
            ])
            ->add('senderStreet', TextType::class, [
                'attr' => array(
                    'class' => 'bg-transparent block border-b-2 w-full h-10 text-2xl outline-none',
                    'placeholder' => ''
                )
            ])
            ->add('senderZIPcode', TextType::class, [
                'attr' => array(
                    'class' => 'bg-transparent block border-b-2 w-full h-10 text-2xl outline-none',
                    'placeholder' => ''
                )
            ])

            ->add('items', CollectionType::class, [
                'entry_type' => ItemType::class,
                'entry_options' => [
                    'label' => false
                ],
                'label' => false,
                'by_reference' => false,
                'allow_add' => true,
                'allow_delete' => true,
                
            ]);


        // $builder
        // ->add('items', CollectionType::class, [
        //     'entry_type' => ItemType::class,
        //     'entry_options' => ['label' => false],
        //     'allow_add' => true
        // ])
        //     ->add('title')
        //     // ->add('order_date')
        //     ->add('odbiorca');


    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Invoice::class,
        ]);
    }
}
