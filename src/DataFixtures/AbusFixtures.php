<?php

namespace App\DataFixtures;

use App\Entity\Abus;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class AbusFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_BE');

        for ($a=1; $a<=10; $a++)
        {
            $abus = new Abus();
            $abus->setEncodage($faker->dateTime('now'))
                 ->setDescription($faker->text);

            $manager->persist($abus);

        }

        $manager->flush();
    }

}