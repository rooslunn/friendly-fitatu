<?php


class VatTypeTest extends \Codeception\Test\Unit
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

    public function createTestVatTypeInDb()
    {
        return $this->tester->haveInRepository('AppBundle\Entity\VatType', [
            'name' => 'Vat1',
            'value' => '0.14',
        ]);
    }

    // tests
    public function testCanCreateAndChangeVatType()
    {
        $id = $this->createTestVatTypeInDb();

        $em = $this->getModule('Doctrine2')->em;
        $vat = $em->find('AppBundle\Entity\VatType', $id);
        $vat->setName('Vat2');
        $vat->setValue('0.20');
        $em->persist($vat);
        $em->flush();

        // Assert
        $this->assertEquals('Vat2', $vat->getName());
        $this->tester->seeInRepository('AppBundle\Entity\VatType', ['id' => $id, 'name' => 'Vat2']);
        $this->tester->dontSeeInRepository('AppBundle\Entity\Product', ['id' => $id, 'name' => 'Vat1']);
    }
}