<?php

namespace App\DataFixtures;

use App\Entity\CodePostal;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class CodePostalFixtures extends Fixture
{
    public const CP_REF = 'CodePostal';
    public const NBR_CP = 10;

    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_BE');

        for ($i = 1; $i <= self::NBR_CP; $i++){

            $cp = new CodePostal();
            $cp->setCodePostal($faker->postcode);

            $manager->persist($cp);

            $this->addReference(self::CP_REF.$i, $cp);
        }
        $manager->flush();
    }
}
