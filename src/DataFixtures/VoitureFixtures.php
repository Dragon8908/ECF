<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Voiture;

class VoitureFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $voiture1 = new Voiture();
        $voiture1->setNom('Volkswaggen coccinelle');
        $voiture1->setPrix(4000);
        $voiture1->setAnnee(2018);
        $voiture1->setKm(20000);
        $voiture1->setFichier('coccinelle.jpg');
        $image1 = $this->getReference('coccinelle');
        $voiture1->setImage($image1);
        $option1 = $this->getReference('coccinelle_option');
        $voiture1->setOption($option1);
        $manager->persist($voiture1);

        $voiture2 = new Voiture();
        $voiture2->setNom('Peugeot 208');
        $voiture2->setPrix(6000);
        $voiture2->setAnnee(2016);
        $voiture2->setKm(50000);
        $voiture2->setFichier('peugeot-208.jpg');
        $image2 = $this->getReference('208');
        $voiture2->setImage($image2);
        $option2 = $this->getReference('208_option');
        $voiture2->setOption($option2);
        $manager->persist($voiture2);

        $voiture3 = new Voiture();
        $voiture3->setNom('Renault Captur');
        $voiture3->setPrix(8000);
        $voiture3->setAnnee(2020);
        $voiture3->setKm(70000);
        $voiture3->setFichier('renault-captur.jpg');
        $image3 = $this->getReference('captur');
        $voiture3->setImage($image3);
        $option3 = $this->getReference('captur_option');
        $voiture3->setOption($option3);
        $manager->persist($voiture3);

        $voiture4 = new Voiture();
        $voiture4->setNom('Opel Corsa');
        $voiture4->setPrix(5500);
        $voiture4->setAnnee(2010);
        $voiture4->setKm(120000);
        $voiture4->setFichier('opel-corsa.jpg');
        $image4 = $this->getReference('corsa');
        $voiture4->setImage($image4);
        $option4 = $this->getReference('corsa_option');
        $voiture4->setOption($option4);
        $manager->persist($voiture4);

        $voiture5 = new Voiture();
        $voiture5->setNom('Audi GT');
        $voiture5->setPrix(15000);
        $voiture5->setAnnee(2019);
        $voiture5->setKm(30000);
        $voiture5->setFichier('audi-gt.jpg');
        $image5 = $this->getReference('audi');
        $voiture5->setImage($image5);
        $option5 = $this->getReference('audi_option');
        $voiture5->setOption($option5);
        $manager->persist($voiture5);

        $voiture6 = new Voiture();
        $voiture6->setNom('Land Rover Freelander');
        $voiture6->setPrix(7000);
        $voiture6->setAnnee(2003);
        $voiture6->setKm(180000);
        $voiture6->setFichier('freelander.jpg');
        $image6 = $this->getReference('freelander');
        $voiture6->setImage($image6);
        $option6 = $this->getReference('freelander_option');
        $voiture6->setOption($option6);
        $manager->persist($voiture6);

        $manager->flush();
    }
}
