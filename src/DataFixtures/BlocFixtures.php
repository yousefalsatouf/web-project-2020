<?php

namespace App\DataFixtures;

use App\Entity\Bloc;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class BlocFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_BE');

        for ($b=1; $b<=10; $b++)
        {
            $bloc = new Bloc();
            $bloc->setNom($faker->word)
                 ->setDescription($faker->text);

            $manager->persist($bloc);

        }

        $manager->flush();
    }

}