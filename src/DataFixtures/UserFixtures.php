<?php

namespace App\DataFixtures;

use App\Entity\User; 
use Doctrine\Bundle\FixturesBundle\Fixture; 
use Doctrine\Persistence\ObjectManager;
use Faker\Factory as FakerFactory;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;


class UserFixtures extends Fixture  
{
    private $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        $admin = new User(); 
        $admin->setEmail('admin@mail.fr');
        $admin->setNom('Parrot');
        $admin->setPrenom('Vincent');
        $admin->setPassword('adminparrot');
        $admin->setRoles(['ROLE_ADMIN']);
        $manager->persist($admin);
        
        $faker = FakerFactory::create('fr_FR');
              
        $users = new User();
        $users->setEmail('employe@mail.fr');
        $users->setNom($faker->lastName());
        $users->setPrenom($faker->firstName());;
        $users->setPassword('employedugarage');
        $users->setRoles(['ROLE_USER']);
        $manager->persist($users);

        $manager->flush();
    } 
}