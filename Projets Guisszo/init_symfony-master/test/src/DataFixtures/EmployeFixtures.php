<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Employe;
use App\Entity\Service;

class EmployeFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
     

        $manager->flush();
    }
}
