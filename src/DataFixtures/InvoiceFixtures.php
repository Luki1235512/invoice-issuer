<?php

namespace App\DataFixtures;

use App\Entity\Invoice;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class InvoiceFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $invoice = new Invoice();

        $invoice->setReceiverName("Darren Beetroot");
        $invoice->setReceiverStreet("ReStrt");
        $invoice->setReceiverZIPcode("12-345");

        $invoice->setSenderName('Luki1235512');
        $invoice->setSenderStreet("SeStrt");
        $invoice->setSenderZIPcode("54-321");

        $invoice->addItem($this->getReference('item_1'));
        $invoice->addItem($this->getReference('item_2'));
        $invoice->addItem($this->getReference('item_3'));

        $manager->persist($invoice);

        // 

        $invoice2 = new Invoice();

        $invoice2->setReceiverName("George");
        $invoice2->setReceiverStreet("ReStrt2");
        $invoice2->setReceiverZIPcode("67-890");

        $invoice2->setSenderName('Luki2155321');
        $invoice2->setSenderStreet("SeStrt2");
        $invoice2->setSenderZIPcode("09-876");

        $invoice2->addItem($this->getReference('item_4'));
        $invoice2->addItem($this->getReference('item_5'));

        $manager->persist($invoice2);

        $manager->flush();


    }

    public function getDependencies()
    {
        return [
            ItemFixtures::class,
        ];
    }

}
