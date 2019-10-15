<?php

namespace App\DataFixtures;

use App\Entity\Internaute;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class InternauteFixtures extends Fixture implements DependentFixtureInterface
{
    public const NBR_INTERNAUTE = 10;

    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_BE');

        for ($i = 1; $i <= self::NBR_INTERNAUTE; $i++){
            $inter = new Internaute();
            $inter->setNom($faker->lastName)
                  ->setPrenom($faker->firstName)
                  ->setAdresseNbr($faker->buildingNumber)
                  ->setAdresseRue($faker->streetName)
                  ->setEmail($inter->getNom()."@gmail.com")
                  ->setLocalite($this->getReference(LocaliteFixtures::AREA_REF.$faker->numberBetween(1, localiteFixtures::NBR_AREA)))
                  ->setCodePostal($this->getReference(CodePostalFixtures::CP_REF.$faker->numberBetween(1, codePostalFixtures::NBR_CP)))
                  ->setCommune($this->getReference(CommuneFixtures::TOWN_REF.$faker->numberBetween(1, CommuneFixtures::NBR_TOWN)));

            $manager->persist($inter);

        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            LocaliteFixtures::class,
            CommuneFixtures::class,
            CodePostalFixtures::class,
        );
    }
}
