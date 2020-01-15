<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $user = new User();
        $faker = Faker\Factory::create();

        $password =  $this->passwordEncoder->encodePassword(
            $user,
            '$argon2id$v=19$m=65536,t=4,p=1$QVF6LmE3NDFidHdtQTZjSQ$MZmi3kLMJgjJ0j/et/ohNgNGHkxX/xQCwA3dg0TLpwc'
        );

        $user->setEmail($faker->email)
            ->setRoles(['user'])
            ->setPassword($password);

        $manager->persist($user);

        $manager->flush();
    }
}
