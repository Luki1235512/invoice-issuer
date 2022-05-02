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
        $invoice->setTitle('Inv 1');

        // $time = new DateTime();
        // $time->format("d.m.Y");
        // $invoice->setOrderDate($time);

        $invoice->setOdbiorca("Dariusz Burak");

        $invoice->addItem($this->getReference('item_1'));
        $invoice->addItem($this->getReference('item_2'));

        $manager->persist($invoice);

        // 

        $invoice2 = new Invoice();
        $invoice2->setTitle('Inv 2');

        // $time = new DateTime();
        // $time->format("d.m.Y");
        // $invoice2->setOrderDate($time);

        $invoice2->setOdbiorca("Jerzy");

        $invoice2->addItem($this->getReference('item_3'));

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
