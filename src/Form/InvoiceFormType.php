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
            ->add('receiverName', TextType::class, [
                'attr' => array(
                    'class' => 'bg-transparent block border-b-2 w-full h-10 text-2xl outline-none',
                    'placeholder' => 'Name'
                ),
                'label' => false,
                'required' => true
            ])
            ->add('receiverStreet', TextType::class, [
                'attr' => array(
                    'class' => 'bg-transparent block border-b-2 w-full h-10 text-2xl outline-none',
                    'placeholder' => 'Street'
                ),
                'label' => false,
                'required' => true
            ])
            ->add('receiverZIPcode', TextType::class, [
                'attr' => array(
                    'class' => 'bg-transparent block border-b-2 w-full h-10 text-2xl outline-none',
                    'placeholder' => 'ZIP Code'
                ),
                'label' => false,
                'required' => true
            ])

            ->add('senderName', TextType::class, [
                'attr' => array(
                    'class' => 'bg-transparent block border-b-2 w-full h-10 text-2xl outline-none',
                    'placeholder' => 'Name'
                ),
                'label' => false,
                'required' => true
            ])
            ->add('senderStreet', TextType::class, [
                'attr' => array(
                    'class' => 'bg-transparent block border-b-2 w-full h-10 text-2xl outline-none',
                    'placeholder' => 'Street'
                ),
                'label' => false,
                'required' => true
            ])
            ->add('senderZIPcode', TextType::class, [
                'attr' => array(
                    'class' => 'bg-transparent block border-b-2 w-full h-10 text-2xl outline-none',
                    'placeholder' => 'ZIP Code'
                ),
                'label' => false,
                'required' => true
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
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Invoice::class,
        ]);
    }
}
