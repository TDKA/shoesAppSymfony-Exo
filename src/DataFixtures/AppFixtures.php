<?php

namespace App\DataFixtures;

use App\Entity\Chaussure;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i < 10; $i++) {

            $chaussure = new Chaussure();
            $chaussure->setName('Air-Max');
            $chaussure->setBrand('Nike');
            $chaussure->setDescription('The new Air-Max is here');

            $manager->persist($chaussure);
        }

        $manager->flush();
    }
}
