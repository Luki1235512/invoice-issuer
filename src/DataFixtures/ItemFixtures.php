<?php

namespace App\DataFixtures;

use App\Entity\InvoiceItem;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ItemFixtures extends Fixture 
{
    public function load(ObjectManager $manager): void
    {
        $item = new InvoiceItem();
        $item->setName("klawiatura");
        $item->setQuantity(5);

        $manager->persist($item);

        // 
        
        $item2 = new InvoiceItem();
        $item2->setName("myszka");
        $item2->setQuantity(3);

        $manager->persist($item2);

        // 

        $item3 = new InvoiceItem();
        $item3->setName("folia");
        $item3->setQuantity(20);

        $manager->persist($item3);

        $manager->flush();

        $this->addReference('item_1', $item);
        $this->addReference('item_2', $item2);
        $this->addReference('item_3', $item3);
    }

}
