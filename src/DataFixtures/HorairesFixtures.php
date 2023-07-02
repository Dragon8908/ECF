<?php

namespace App\DataFixtures;

use App\Entity\Horaires;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class HorairesFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $horaires1 = new Horaires();
        $horaires1->setJour('Lun.');
        $horaires1->setMatin('08:45 - 12:00');
        $horaires1->setAprem('14:00 - 18:00');
        $manager->persist($horaires1);

        $horaires2 = new Horaires();
        $horaires2->setJour('Mar.');
        $horaires2->setMatin('08:45 - 12:00');
        $horaires2->setAprem('14:00 - 18:00');
        $manager->persist($horaires2);

        $horaires3 = new Horaires();
        $horaires3->setJour('Mer.');
        $horaires3->setMatin('08:45 - 12:00');
        $horaires3->setAprem('14:00 - 18:00');
        $manager->persist($horaires3);

        $horaires4 = new Horaires();
        $horaires4->setJour('Jeu.');
        $horaires4->setMatin('08:45 - 12:00');
        $horaires4->setAprem('14:00 - 18:00');
        $manager->persist($horaires4);

        $horaires5 = new Horaires();
        $horaires5->setJour('Ven.');
        $horaires5->setMatin('08:45 - 12:00');
        $horaires5->setAprem('14:00 - 18:00');
        $manager->persist($horaires5);

        $horaires6 = new Horaires();
        $horaires6->setJour('Sam.');
        $horaires6->setMatin('08:45 - 12:00');
        $horaires6->setAprem('');
        $manager->persist($horaires6);

        $horaires7 = new Horaires();
        $horaires7->setJour('Dim.');
        $horaires7->setMatin('Fermé');
        $horaires7->setAprem('');
        $manager->persist($horaires7);

        $manager->flush();
    }
}