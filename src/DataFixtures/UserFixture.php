<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixture extends Fixture
{
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        // Create a sample user
        $user = new User();
        $user->setEmail('admin@hanna.com');
        $user->setRoles(['ROLE_ADMIN']);

        // Hash the password before setting it
        $hashedPassword = $this->passwordHasher->hashPassword($user, 'jLWMah*>5tW');
        $user->setPassword($hashedPassword);

        $manager->persist($user);

//        // Add more users if needed
//        for ($i = 1; $i <= 10; $i++) {
//            $user = new User();
//            $user->setEmail("user$i@example.com");
//            $user->setRoles(['ROLE_USER']);
//            $hashedPassword = $this->passwordHasher->hashPassword($user, 'password123');
//            $user->setPassword($hashedPassword);
//
//            $manager->persist($user);
//        }

        $manager->flush();
    }
}

