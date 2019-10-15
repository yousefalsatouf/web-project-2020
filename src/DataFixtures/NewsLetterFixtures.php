<?php

namespace App\DataFixtures;

use App\Entity\NewsLetter;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class NewsLetterFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create();

        for ($n=1; $n<=10; $n++)
        {
            $newsLet = new NewsLetter();
            $newsLet->setPublication($faker->dateTime('now'))
                    ->setTitre($faker->title);

            $manager->persist($newsLet);

        }
        $manager->flush();
    }
}