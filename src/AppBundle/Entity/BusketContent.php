<?php

namespace AppBundle\Entity;

use AppBundle\Repository\BusketRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Busket
 *
 * @ORM\Table(name="busket_content")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BusketContentRepository")
 */
class BusketContent
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
     * @ORM\Column(name="busket_id", type="integer")
     */
    private $busketId;

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
     * @Assert\GreaterThan(0)
     */
    private $qty;


    /**
     * @ORM\ManyToOne(targetEntity="Product", inversedBy="in_buskets")
     * @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     */
    private $product;

    /**
     * @ORM\ManyToOne(targetEntity="VatType", inversedBy="in_buskets")
     * @ORM\JoinColumn(name="vat_type_id", referencedColumnName="id")
     */
    private $vatType;

    /**
     * @ORM\ManyToOne(targetEntity="Busket", inversedBy="in_buskets")
     * @ORM\JoinColumn(name="busket_id", referencedColumnName="id")
     */
    private $busket;

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

    /**
     * @return int
     */
    public function getBusketId(): int
    {
        return $this->busketId;
    }

    /**
     * @param int $busket_id
     */
    public function setBusketId(int $busket_id)
    {
        $this->busketId = $busket_id;
    }

    /**
     * @return mixed
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * @return mixed
     */
    public function getVatType()
    {
        return $this->vatType;
    }

    /**
     * @return mixed
     */
    public function getBusket()
    {
        return $this->busket;
    }

    /**
     * @param mixed $product
     * @return BusketContent
     */
    public function setProduct($product)
    {
        $this->product = $product;
        return $this;
    }

    /**
     * @param mixed $vatType
     * @return BusketContent
     */
    public function setVatType($vatType)
    {
        $this->vatType = $vatType;
        return $this;
    }

    /**
     * @param mixed $busket
     * @return BusketContent
     */
    public function setBusket($busket)
    {
        $this->busket = $busket;
        return $this;
    }
}

