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
use AppBundle\Entity\VatType;

class VatTypes implements FixtureInterface
{
    const VAT_COUNT = 8;

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $vat = new VatType();
        foreach (range(1, self::VAT_COUNT) as $i) {
            $vat_new = clone $vat;
            $vat_new->setName(sprintf('VatType %d', $i));
            $vat_new->setValue(random_int(1, 50)/100);
            $manager->persist($vat_new);
        }

        // Vat for acceptance test
        $vat_new = clone $vat;
        $vat_new->setName('VatType Test');
        $vat_new->setValue(0.14);
        $manager->persist($vat_new);

        $manager->flush();
    }
}