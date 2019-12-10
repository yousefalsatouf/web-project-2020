<?php

namespace App\DataFixtures;

use App\Entity\Prestataire;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class PrestataireFixtures extends Fixture implements DependentFixtureInterface
{
    public const NBR_PRESTATAIRE = 25;

    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_BE');

        for ($i = 1; $i <= self::NBR_PRESTATAIRE; $i++){
            $pres = new Prestataire();
            $pres->setNom($faker->company)
                 ->setNumTel($faker->phoneNumber)
                 ->setAdresseNbr($faker->buildingNumber)
                 ->setAdresseRue($faker->streetName)
                 ->setEmail($faker->name."@".$pres->getNom().".com")
                 ->setEMailContact("info@".$pres->getNom().".com")
                 ->setNumTVA($faker->numberBetween(0, 100))
                 ->setSiteInternet("www.".$pres->getNom().".com")
                 ->setLocalite($this->getReference(LocaliteFixtures::AREA_REF.$faker->numberBetween(1, localiteFixtures::NBR_AREA)))
                 ->setCodePostal($this->getReference(CodePostalFixtures::CP_REF.$faker->numberBetween(1, codePostalFixtures::NBR_CP)))
                 ->setCommune($this->getReference(CommuneFixtures::TOWN_REF.$faker->numberBetween(1, CommuneFixtures::NBR_TOWN)))
                 ->addCategorieDeService($this->getReference(CategorieDeServicesFixtures::SER_CAT_REF.$faker->numberBetween(1,CategorieDeServicesFixtures::NBR_SER_CAT)));

            $manager->persist($pres);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            LocaliteFixtures::class,
            CommuneFixtures::class,
            CodePostalFixtures::class,
            CategorieDeServicesFixtures::class,
        );
    }
}
