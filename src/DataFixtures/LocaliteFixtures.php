<?php

namespace App\DataFixtures;

use App\Entity\Localite;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class LocaliteFixtures extends Fixture
{
    public const AREA_REF = 'localite';
    public const NBR_AREA = 5;

    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_BE');

        for ($i = 1; $i <= self::NBR_AREA; $i++){
            $area = new Localite();
            $area->setLocalite($faker->city);

            $manager->persist($area);

            $this->addReference(self::AREA_REF.$i, $area);
        }
        $manager->flush();
    }
}
