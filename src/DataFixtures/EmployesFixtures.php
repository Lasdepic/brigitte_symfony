<?php

namespace App\DataFixtures;

use App\Enum\Sexe;
use App\Entity\Employes;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class EmployesFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        for ($i = 0; $i < 20; $i++) {
            $employe = new Employes();
            $employe->setNomEmploye("Nom {$i}");
            $employe->setPrenomEmploye("Prénom {$i}");
            $employe->setNumEmploye("06264587{$i}");
            $employe->setSexeEmploye(Sexe::MASCULIN);
            $employe->setVilleEmploye("Ville {$i}");
            $employe->setTypePoste("Gardien");
            $manager->persist($employe);
        }


        $manager->flush();
    }
}
