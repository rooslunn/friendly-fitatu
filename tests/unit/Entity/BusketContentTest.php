<?php


class BusketContentTest extends \Codeception\Test\Unit
{
    const TEST_PRICE = 199.99;
    const TEST_VAT = 0.14;

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

    // tests
    public function testCanAddItemsToBusket()
    {
        $this->markTestIncomplete();
//        $em = $this->getModule('Doctrine2')->em;

        // Arrange
//        $busket_id = $this->tester->haveInRepository('AppBundle\Entity\Busket', [
//            'name' => 'Test Busket',
//        ]);
//        $busket = $em->find('AppBundle\Entity\Busket', $busket_id);

//        $product_id = $this->tester->haveInRepository('AppBundle\Entity\Product', [
//            'name' => 'Test Product',
//            'price' => self::TEST_PRICE,
//        ]);
//        $product = $em->find('AppBundle\Entity\Product', $product_id);
//
//        $vat_type_id = $this->tester->haveInRepository('AppBundle\Entity\VatType', [
//            'name' => 'Test VAT',
//            'value' => self::TEST_VAT,
//        ]);
//        $vat_type = $em->find('AppBundle\Entity\VatType', $vat_type_id);
//
//        $item_id = $this->tester->haveInRepository('AppBundle\Entity\BusketContent', [
//            'busket' => $busket,
//            'product' => $product,
//            'vat_type' => $vat_type,
//            'price' => self::TEST_PRICE,
//            'vat' => self::TEST_VAT,
//            'qty' => 99,
//        ]);
//
//        // Act
//        $item_in_db = $em->find('AppBundle\Entity\BusketContent', $item_id);
//
//        // Assert
//        $this->assertEquals($busket_id, $item_in_db->getBusketId());
//        $this->assertEquals($product_id, $item_in_db->getProductId());
//        $this->assertEquals($vat_type_id, $item_in_db->getVatTypeId());
//        $this->assertEquals(self::TEST_PRICE, $item_in_db->getPrice());
//        $this->assertEquals(self::TEST_VAT, $item_in_db->getVat());
    }
}