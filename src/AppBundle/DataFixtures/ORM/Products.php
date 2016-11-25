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
use AppBundle\Entity\Product;

class Products implements FixtureInterface
{
    const PRODUCT_COUNT = 8;

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     * @throws \AppBundle\Exception\ProductPriceCantBeNegative
     */
    public function load(ObjectManager $manager)
    {
        $product = new Product();
        foreach (range(1, self::PRODUCT_COUNT) as $i) {
            $product_new = clone $product;
            $product_new->setName(sprintf('Product %d', $i));
            $product_new->setDescription(sprintf('Description for product %d', $i));
            $product_new->setPrice(random_int(1, 99) * $i);
            $manager->persist($product_new);
        }

        // Product for acceptance test
        $product_new = clone $product;
        $product_new->setName('Product Test');
        $product_new->setPrice(100);
        $manager->persist($product_new);

        $manager->flush();
    }
}