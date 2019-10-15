<?php

namespace App\DataFixtures;

use App\Entity\Commentaire;
use App\Entity\Internaute;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class CommentaireFixtures extends Fixture
{
    public const NBR_COMMENTAIRE = 10;

    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_BE');

        for ($c=1; $c<=self::NBR_COMMENTAIRE; $c++)
        {
            $commen = new Commentaire();
            $commen->setContenu($faker->text)
                   ->setCote($faker->numberBetween(0, 5))
                   ->setEncodage($faker->numberBetween(0, 10))
                   ->setTitre($faker->title);

            $manager->persist($commen);

        }
        $manager->flush();
    }

}