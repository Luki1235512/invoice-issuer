<?php

namespace App\DataFixtures;

use App\Entity\InvoiceItem;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ItemFixtures extends Fixture 
{
    public function load(ObjectManager $manager): void
    {
        $item = new InvoiceItem();
        $item->setName("klawiatura");
        $item->setQuantity(5);
        $item->setUnitPrice(10);
        $item->setTax(10);

        $manager->persist($item);

        // 
        
        $item2 = new InvoiceItem();
        $item2->setName("myszka");
        $item2->setQuantity(5);
        $item2->setUnitPrice(8);
        $item2->setTax(11);

        $manager->persist($item2);

        // 

        $item3 = new InvoiceItem();
        $item3->setName("folia");
        $item3->setQuantity(20);
        $item3->setUnitPrice(21);
        $item3->setTax(5);

        $manager->persist($item3);

        //

        $item4 = new InvoiceItem();
        $item4->setName("krzesło");
        $item4->setQuantity(2);
        $item4->setUnitPrice(46);
        $item4->setTax(27);

        $manager->persist($item4);

        //

        $item5 = new InvoiceItem();
        $item5->setName("drzwi");
        $item5->setQuantity(1);
        $item5->setUnitPrice(700);
        $item5->setTax(40);

        $manager->persist($item5);

        $manager->flush();

        $this->addReference('item_1', $item);
        $this->addReference('item_2', $item2);
        $this->addReference('item_3', $item3);
        $this->addReference('item_4', $item4);
        $this->addReference('item_5', $item5);
    }

}
