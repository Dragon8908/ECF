<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Option;

class OptionFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $option1 = new Option();
        $option1->setGalerie('');
        $option1->setCaracteristiques('Volkswaggen Coccinelle rouge, en bon état, de 2018, ayant peu roulée');
        $option1->setEquipements('gps, caméra de recul, avertisseurs sonores');
        $manager->persist($option1);
        $this->addReference('coccinelle_option', $option1);

        $option2 = new Option();
        $option2->setGalerie('');
        $option2->setCaracteristiques('Peugeot 208 bleue, en bon état, avec 50 000 km au compteur, mais marche toujours aussi bien');
        $option2->setEquipements('equipements et option récents(gps,caméra de recul, averisseurs de proximité, facilité pour se garer)');
        $manager->persist($option2);
        $this->addReference('208_option', $option2);

        $option3 = new Option();
        $option3->setGalerie('');
        $option3->setCaracteristiques('Renault Captur Orange avec toit blanc, en tés bon état ');
        $option3->setEquipements('Posséde la plupart des options et a même un détecteur de radar');
        $manager->persist($option3);
        $this->addReference('captur_option', $option3);

        $option4 = new Option();
        $option4->setGalerie('');
        $option4->setCaracteristiques('');
        $option4->setEquipements('');
        $manager->persist($option4);
        $this->addReference('corsa_option', $option4);

        $option5 = new Option();
        $option5->setGalerie('');
        $option5->setCaracteristiques('');
        $option5->setEquipements('');
        $manager->persist($option5);
        $this->addReference('audi_option', $option5);

        $option6 = new Option();
        $option6->setGalerie('');
        $option6->setCaracteristiques('');
        $option6->setEquipements('');
        $manager->persist($option6);
        $this->addReference('freelander_option', $option6);

        $manager->flush();
    }
}
