<?php
/**
 * Created by PhpStorm.
 * User: russ
 * Date: 11/24/16
 * Time: 4:15 PM
 */

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Busket;

class DefaultBusket implements FixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $busket = new Busket();
        $busket->setName('Test Busket');
        $manager->persist($busket);
        $manager->flush();
    }
}