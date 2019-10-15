<?php

namespace App\DataFixtures;

use App\Entity\Stage;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class StageFixtures extends Fixture
{
    public const NBR_STAGE = 10;

    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create();

        for ($s=1; $s<= self::NBR_STAGE; $s++)
        {
            $stag = new Stage();
            $stag->setAffichageDe($faker->dateTime('now'))
                 ->setAffichageA($faker->dateTimeThisDecade('+7 months'))
                 ->setDebut($faker->dateTime('now'))
                 ->setDescription($faker->text)
                 ->setFin($faker->dateTimeThisDecade('+10 months'))
                 ->setInfoComplementaire($faker->sentence(10))
                 ->setNom($faker->company)
                 ->setTarif($faker->numberBetween(10, 300));

            $manager->persist($stag);

        }
        $manager->flush();
    }
}