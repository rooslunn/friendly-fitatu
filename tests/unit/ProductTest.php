<?php


class ProductTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    /**
     * @return int
     */
    private function createTestProductInDb(): int
    {
        return $this->tester->haveInRepository('AppBundle\Entity\Product', [
            'name' => 'Socks1',
            'description' => 'Socks1',
            'price' => '100',
        ]);
    }

    // tests
    public function testProductCanBeCreatedAndChanged()
    {
        // Arrange
        $id = $this->createTestProductInDb();

        // Act
        $em = $this->getModule('Doctrine2')->em;
        $product = $em->find('AppBundle\Entity\Product', $id);
        $product->setName('Socks2');
        $em->persist($product);
        $em->flush();

        // Assert
        $this->assertEquals('Socks2', $product->getName());
        $this->tester->seeInRepository('AppBundle\Entity\Product', ['id' => $id, 'name' => 'Socks2']);
        $this->tester->dontSeeInRepository('AppBundle\Entity\Product', ['id' => $id, 'name' => 'Socks1']);
    }

    public function testPriceCantBeNegative()
    {
        // Arrange
        $id = $this->createTestProductInDb();

        // Act
        $em = $this->getModule('Doctrine2')->em;
        $product = $em->find('AppBundle\Entity\Product', $id);
        $this->tester->expectException(
            AppBundle\Exception\ProductPriceCantBeNegative::class, function () use ($product) {
                $product->setPrice('-100');
            }
        );
        $em->persist($product);
        $em->flush();

        // Assert
        $this->tester->dontSeeInRepository('AppBundle\Entity\Product', ['id' => $id, 'price' => '-100']);
    }
}