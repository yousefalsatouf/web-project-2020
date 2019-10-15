<?php

namespace App\DataFixtures;

use App\Entity\Position;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class PositionFixtures extends Fixture
{
    public const NBR_POSITION = 10;

    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create();

        for ($p=1; $p<=self::NBR_POSITION; $p++)
        {
            $posit = new Position();
            $posit->setOrdre($faker->numberBetween(0, 100));

            $manager->persist($posit);

        }
        $manager->flush();
    }
}