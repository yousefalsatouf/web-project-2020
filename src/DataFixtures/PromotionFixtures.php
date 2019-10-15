<?php

namespace App\DataFixtures;

use App\Entity\Promotion;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class PromotionFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create();

        for ($p=1; $p<=10; $p++)
        {
            $prom = new Promotion();
            $prom->setAffichageDe($faker->dateTime('now'))
                ->setAffichageA($faker->dateTimeThisDecade('+7 months'))
                ->setDebut($faker->dateTime('now'))
                ->setDescription($faker->sentence(5))
                ->setDocumentPdf($faker->fileExtension)
                ->setFin($faker->dateTimeThisDecade('+7 months'))
                ->setNom($faker->word);

            $manager->persist($prom);

        }
        $manager->flush();
    }

}