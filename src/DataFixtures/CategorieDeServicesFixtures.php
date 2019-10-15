<?php

namespace App\DataFixtures;

use App\Entity\CategorieDeServices;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class CategorieDeServicesFixtures extends Fixture
{

    public const SER_CAT_REF = 'categorieDeService';
    public const NBR_SER_CAT = 5;

    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_BE');

        for ($i = 1; $i <= self::NBR_SER_CAT; $i++){
            $servCat = new CategorieDeServices();
            $servCat->setNom($faker->title)
                    ->setDescription($faker->text);

            $manager->persist($servCat);

            $this->addReference(self::SER_CAT_REF.$i, $servCat);
        }
        $manager->flush();
    }
}
