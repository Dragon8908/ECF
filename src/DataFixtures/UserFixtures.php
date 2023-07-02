<?php

namespace App\DataFixtures;

use App\Entity\User; 
use Doctrine\Bundle\FixturesBundle\Fixture; 
use Doctrine\Persistence\ObjectManager;
use Faker\Factory as FakerFactory;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;


class UserFixtures extends Fixture  
{
    private $encoder;

    public function __construct(UserPasswordHasherInterface $encoder)
    {
        $this->encoder = $encoder;
        
    }

    public function load(ObjectManager $manager): void
    {
        $admin = new User(); 
        $admin->setEmail('admin@mail.fr')
            ->setNom('Parrot')
            ->setPrenom('Vincent');
        $password = $this->encoder->hashPassword($admin, 'password');
        $admin->setPassword($password)
            ->setRoles(['ROLE_ADMIN']);
        $manager->persist($admin);
        
        $faker = FakerFactory::create('fr_FR');
              
        $users = new User();
        $users->setEmail($faker->email());
        $users->setNom($faker->lastName());
        $users->setPrenom($faker->firstName());;
        $password = $this->encoder->hashPassword($users, 'secret');
        $users->setPassword($password);
        $users->setRoles(['ROLE_USER']);
        $manager->persist($users);

        $manager->flush();
    } 
}