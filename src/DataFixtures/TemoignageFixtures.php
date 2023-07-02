<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Temoignage;

class TemoignageFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $temoignage1 = new Temoignage();
        $temoignage1->setNom('Michel Dupuis');
        $temoignage1->setCommentaire('J\'ai reçu un trés bon accueil, le personnel est trés sympathique, et ma voiture marche encore mieux qu\'avant depuis mon contôle technique, je vous le recommande');
        $temoignage1->setNote(4.5);
        $manager->persist($temoignage1);

        $temoignage2 = new Temoignage();
        $temoignage2->setNom('Edwardo');
        $temoignage2->setCommentaire('Garage trés accueillant, on s\'y sent comme chez soi, propose tous types de services et à des prix défiant toutes concurrence');
        $temoignage2->setNote(4);
        $manager->persist($temoignage2);

        $temoignage3 = new Temoignage();
        $temoignage3->setNom('Pauline Dumortier');
        $temoignage3->setCommentaire('Personnel très professionel et très rapide, je suis allée au garage en mai pour faire réparer mon pot d\'échappement et en deux heures c\'était dejà fait et à prix bas qui plus est, je vous recommande ce garage pour toutes vos réparation');
        $temoignage3->setNote(5);
        $manager->persist($temoignage3);

        $manager->flush();
    }
}
