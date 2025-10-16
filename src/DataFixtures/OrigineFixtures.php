<?php

namespace App\DataFixtures;

use App\Entity\Origine;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class OrigineFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        for ($i = 0; $i < 10; $i++) {
            $origine = new Origine();
            $origine->setPays("Origine {$i}");
            $manager->persist($origine);
        }


        // $product = new Product();

        $manager->flush();
    }
}
