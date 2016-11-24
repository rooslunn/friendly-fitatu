<?php
/**
 * Created by PhpStorm.
 * User: russ
 * Date: 11/24/16
 * Time: 9:51 PM
 */

namespace AppBundle\UseCase;


use AppBundle\Entity\Busket;
use AppBundle\Entity\BusketContent;
use Doctrine\Common\Persistence\ObjectManager;

class AddItemUseCase
{
    /**
     * @var ObjectManager
     */
    protected $em;

    public function __construct(ObjectManager $em)
    {
        $this->em = $em;
    }

    public function execute(Busket $busket, BusketContent $item)
    {
        $item->setBusket($busket);
        $item->setPrice($item->getProduct()->getPrice());
        $item->setVat($item->getVatType()->getValue());

        $this->em->persist($item);
        $this->em->flush();
    }
}