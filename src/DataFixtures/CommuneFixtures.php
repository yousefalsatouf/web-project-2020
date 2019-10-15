<?php

namespace App\DataFixtures;

use App\Entity\Commune;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;


class CommuneFixtures extends Fixture
{
    public const TOWN_REF = 'commune';
    public const NBR_TOWN = 10;

    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_BE');

        for ($i = 1; $i <= self::NBR_TOWN; $i++){
            $town = new Commune();
            $town ->setCommune($faker->city);
            $manager->persist($town);

            $this->addReference(self::TOWN_REF.$i, $town);
        }
        $manager->flush();
    }
}
