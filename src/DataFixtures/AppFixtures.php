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
        // --- Création de 10 adoptants écrits en dur ---
        $adoptant1 = new Adoptant();
        $adoptant1->setNom('Dupont Jean');
        $manager->persist($adoptant1);

        $adoptant2 = new Adoptant();
        $adoptant2->setNom('Martin Claire');
        $manager->persist($adoptant2);

        $adoptant3 = new Adoptant();
        $adoptant3->setNom('Leroy Paul');
        $manager->persist($adoptant3);

        $adoptant4 = new Adoptant();
        $adoptant4->setNom('Durand Sophie');
        $manager->persist($adoptant4);

        $adoptant5 = new Adoptant();
        $adoptant5->setNom('Moreau Louis');
        $manager->persist($adoptant5);

        $adoptant6 = new Adoptant();
        $adoptant6->setNom('Bernard Chloé');
        $manager->persist($adoptant6);

        $adoptant7 = new Adoptant();
        $adoptant7->setNom('Garcia Antoine');
        $manager->persist($adoptant7);

        $adoptant8 = new Adoptant();
        $adoptant8->setNom('Petit Julie');
        $manager->persist($adoptant8);

        $adoptant9 = new Adoptant();
        $adoptant9->setNom('Robert Hugo');
        $manager->persist($adoptant9);

        $adoptant10 = new Adoptant();
        $adoptant10->setNom('Richard Emma');
        $manager->persist($adoptant10);

        // --- Création de 10 animaux écrits en dur ---
        $animal1 = new Animals();
        $animal1->setNom('Rex');
        $animal1->setSexe('Mâle');
        $animal1->setDataNaissance(new \DateTime('2018-04-15'));
        $animal1->setAge(7);
        $animal1->setNumeroIdentification(1);
        $animal1->setAdoptable(false);
        $animal1->setDateArrive(new \DateTime('2020-06-01'));
        $animal1->setAdoptant($adoptant1);
        $manager->persist($animal1);

        $animal2 = new Animals();
        $animal2->setNom('Bella');
        $animal2->setSexe('Femelle');
        $animal2->setDataNaissance(new \DateTime('2020-09-12'));
        $animal2->setAge(5);
        $animal2->setNumeroIdentification(2);
        $animal2->setAdoptable(true);
        $animal2->setDateArrive(new \DateTime('2023-01-20'));
        $animal2->setAdoptant(null);
        $manager->persist($animal2);

        $animal3 = new Animals();
        $animal3->setNom('Milo');
        $animal3->setSexe('Mâle');
        $animal3->setDataNaissance(new \DateTime('2016-02-10'));
        $animal3->setAge(9);
        $animal3->setNumeroIdentification(3);
        $animal3->setAdoptable(false);
        $animal3->setDateArrive(new \DateTime('2019-11-05'));
        $animal3->setAdoptant($adoptant2);
        $manager->persist($animal3);

        $animal4 = new Animals();
        $animal4->setNom('Luna');
        $animal4->setSexe('Femelle');
        $animal4->setDataNaissance(new \DateTime('2021-03-25'));
        $animal4->setAge(4);
        $animal4->setNumeroIdentification(4);
        $animal4->setAdoptable(true);
        $animal4->setDateArrive(new \DateTime('2023-09-10'));
        $animal4->setAdoptant(null);
        $manager->persist($animal4);

        $animal5 = new Animals();
        $animal5->setNom('Rocky');
        $animal5->setSexe('Mâle');
        $animal5->setDataNaissance(new \DateTime('2017-07-02'));
        $animal5->setAge(8);
        $animal5->setNumeroIdentification(5);
        $animal5->setAdoptable(false);
        $animal5->setDateArrive(new \DateTime('2021-02-18'));
        $animal5->setAdoptant($adoptant3);
        $manager->persist($animal5);

        $animal6 = new Animals();
        $animal6->setNom('Nala');
        $animal6->setSexe('Femelle');
        $animal6->setDataNaissance(new \DateTime('2019-11-23'));
        $animal6->setAge(6);
        $animal6->setNumeroIdentification(6);
        $animal6->setAdoptable(true);
        $animal6->setDateArrive(new \DateTime('2022-05-12'));
        $animal6->setAdoptant(null);
        $manager->persist($animal6);

        $animal7 = new Animals();
        $animal7->setNom('Toby');
        $animal7->setSexe('Mâle');
        $animal7->setDataNaissance(new \DateTime('2022-02-02'));
        $animal7->setAge(3);
        $animal7->setNumeroIdentification(7);
        $animal7->setAdoptable(false);
        $animal7->setDateArrive(new \DateTime('2023-07-08'));
        $animal7->setAdoptant($adoptant4);
        $manager->persist($animal7);

        $animal8 = new Animals();
        $animal8->setNom('Misty');
        $animal8->setSexe('Femelle');
        $animal8->setDataNaissance(new \DateTime('2023-01-15'));
        $animal8->setAge(2);
        $animal8->setNumeroIdentification(8);
        $animal8->setAdoptable(true);
        $animal8->setDateArrive(new \DateTime('2024-03-09'));
        $animal8->setAdoptant(null);
        $manager->persist($animal8);

        $animal9 = new Animals();
        $animal9->setNom('Oscar');
        $animal9->setSexe('Mâle');
        $animal9->setDataNaissance(new \DateTime('2015-09-09'));
        $animal9->setAge(10);
        $animal9->setNumeroIdentification(9);
        $animal9->setAdoptable(false);
        $animal9->setDateArrive(new \DateTime('2019-02-19'));
        $animal9->setAdoptant($adoptant5);
        $manager->persist($animal9);

        $animal10 = new Animals();
        $animal10->setNom('Chanel');
        $animal10->setSexe('Femelle');
        $animal10->setDataNaissance(new \DateTime('2022-08-17'));
        $animal10->setAge(3);
        $animal10->setNumeroIdentification(10);
        $animal10->setAdoptable(true);
        $animal10->setDateArrive(new \DateTime('2024-02-25'));
        $animal10->setAdoptant(null);
        $manager->persist($animal10);

        // --- Envoi en base ---
        $manager->flush();
    }
}
