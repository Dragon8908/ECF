<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Image;

class ImageFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $image1 = new Image(); 
        $image1->setTitre('Volswaggen Coccinelle');
        $image1->setDescription('Une superbe coccinelle rouge pomme de 2018, avec seulement 20 000 km au compteur, posséde un gps ,une caméra de recul et des avertisseurs sonores, elle est à seulement à 4000 euros, profitez-en');
        $image1->setFichier('coccinelle.jpg');
        $manager->persist($image1);
        $this->addReference('coccinelle', $image1);

        $image2 = new Image(); 
        $image2->setTitre('Peugeot 208');
        $image2->setDescription('Une magnifique peugeot 208 bleue claire de 2016, avec 50 000 km au compteur avec toutes les options, equipements assez récents, à seulement 6000 euros une affaire en or');
        $image2->setFichier('peugeot-208.jpg');
        $manager->persist($image2);
        $this->addReference('208', $image2);

        $image3 = new Image(); 
        $image3->setTitre('Renault Captur');
        $image3->setDescription('Une belle renault capture orange avec toit blanc de 2020, avec 70 000 km au compteur, posséde toutes les options et équipements, elle est à 8000 euros et vraiment en très bon état, on la croirait neuve');
        $image3->setFichier('renault-captur.jpg');
        $manager->persist($image3);
        $this->addReference('captur', $image3);

        $image4 = new Image();
        $image4->setTitre('Opel Corsa');
        $image4->setDescription('');
        $image4->setFichier('opel-corsa.jpg');
        $manager->persist($image4);
        $this->addReference('corsa', $image4);

        $image5 = new Image();
        $image5->setTitre('Audi GT');
        $image5->setDescription('');
        $image5->setFichier('audi-gt.jpg');
        $manager->persist($image5);
        $this->addReference('audi', $image5);

        $image6 = new Image();
        $image6->setTitre('Land Rover Freelander');
        $image6->setDescription('');
        $image6->setFichier('freelander.jpg');
        $manager->persist($image6);
        $this->addReference('freelander', $image6);

        $manager->flush();
    }
}
