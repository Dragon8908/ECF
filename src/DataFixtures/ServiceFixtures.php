<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Service;

class ServiceFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $service1 = new Service();
        $service1->setTitre('Contrôle technique');
        $service1->setDescription('Nous faisons votre contrôle technique pour vérifier que votre voiture est toujours en état de rouler auprès de la loi, pour seulement 70 euros, plus bas que la concurrence');
        $manager->persist($service1);

        $service2 = new Service();
        $service2->setTitre('Révision de votre voiture');
        $service2->setDescription('Nous controlons votre voiture en vérifiant qu\'il n\'y a aucun problème mineur ou majeur, et en les corrigeant si nécessaire. Le prix varie en fonction de potentielles réparations, mais moins de 50 euros en moyenne');
        $manager->persist($service2);

        $service3 = new Service();
        $service3->setTitre('Répararation importante');
        $service3->setDescription('Vous avez besoin d\'une réparation importante de votre véhicule(vitre cassée, portière abimée, pot catalyseur volé, etc..), nous sommes là pour vous. Le prix varie en fonction de la piéce changée, vous pouvez aussi demadé des piéces d\'occasion');
        $manager->persist($service3);

        $service4 = new Service();
        $service4->setTitre('Vidange et entretien de votre voiture');
        $service4->setDescription('Nous faisons la vidange de votre voiture, nous vérifions les niveaux des différents liquides et les rmplissons si nécessaire, et enfin nous nettoyons et lustrons votre voiture, elle sera comme neuve qund vous viendriez la récuperer. Au prix de 30 euros seulement');
        $manager->persist($service4);

        $manager->flush();
    }
}
