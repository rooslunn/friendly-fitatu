<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Busket
 *
 * @ORM\Table(name="busket")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BusketRepository")
 */
class Busket
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="product_id", type="integer")
     */
    private $productId;

    /**
     * @var int
     *
     * @ORM\Column(name="vat_type_id", type="integer")
     */
    private $vatTypeId;

    /**
     * @var string
     *
     * @ORM\Column(name="price", type="decimal", precision=10, scale=2)
     */
    private $price;

    /**
     * @var string
     *
     * @ORM\Column(name="vat", type="decimal", precision=4, scale=3)
     */
    private $vat;

    /**
     * @var int
     *
     * @ORM\Column(name="qty", type="integer")
     */
    private $qty;


    /**
     * @ORM\ManyToOne(targetEntity="Product", inversedBy="buskets")
     * @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     */
    private $product;

    /**
     * @ORM\ManyToOne(targetEntity="VatType", inversedBy="buskets")
     * @ORM\JoinColumn(name="vat_type_id", referencedColumnName="id")
     */
    private $vatType;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set productId
     *
     * @param integer $productId
     *
     * @return Busket
     */
    public function setProductId($productId)
    {
        $this->productId = $productId;

        return $this;
    }

    /**
     * Get productId
     *
     * @return int
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * Set vatTypeId
     *
     * @param integer $vatTypeId
     *
     * @return Busket
     */
    public function setVatTypeId($vatTypeId)
    {
        $this->vatTypeId = $vatTypeId;

        return $this;
    }

    /**
     * Get vatTypeId
     *
     * @return int
     */
    public function getVatTypeId()
    {
        return $this->vatTypeId;
    }

    /**
     * Set price
     *
     * @param string $price
     *
     * @return Busket
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set qty
     *
     * @param integer $qty
     *
     * @return Busket
     */
    public function setQty($qty)
    {
        $this->qty = $qty;

        return $this;
    }

    /**
     * Get qty
     *
     * @return int
     */
    public function getQty()
    {
        return $this->qty;
    }

    /**
     * @return string
     */
    public function getVat(): string
    {
        return $this->vat;
    }

    /**
     * @param string $vat
     */
    public function setVat(string $vat)
    {
        $this->vat = $vat;
    }
}

