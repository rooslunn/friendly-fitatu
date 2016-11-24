<?php
/**
 * Created by PhpStorm.
 * User: russ
 * Date: 11/23/16
 * Time: 9:05 PM
 */

namespace AppBundle\UseCase;

use AppBundle\Entity\Busket;
use AppBundle\Repository\{
    BusketContentRepository,
    BusketRepository
};

class ListBusketContentUseCase
{
    /**
     * @var \AppBundle\Repository\BusketContentRepository
     */
    protected $repository;

    public function __construct(BusketContentRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(Busket $busket)
    {
        return $this->repository->findByBusket($busket->getId());
    }
}