<?php

namespace App\DataFixtures;

use App\Entity\Adoptant;
use App\Entity\Animals;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 4; $i++) {
            $animal = new Animals();
            $animal->setNom("Animal  {$i}");
            $manager->persist($animal);
            // $product = new Product();
            // $manager->persist($product);

        }

        for ($i = 0; $i < 4; $i++) {
            $adoptant = new Adoptant();
            $adoptant->setNom("Adoptant {$i}");
            $manager->persist($adoptant);
            // $product = new Product();
            // $manager->persist($product);

        }
        $manager->flush();
    }
}
