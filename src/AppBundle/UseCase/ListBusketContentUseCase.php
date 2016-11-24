<?php
/**
 * Created by PhpStorm.
 * User: russ
 * Date: 11/23/16
 * Time: 9:05 PM
 */

namespace AppBundle\UseCase;

use AppBundle\Repository\BusketContentRepository;

class ListBusketContentUseCase
{
    const DEFAULT_BUSKET = 1;

    /**
     * @var \AppBundle\Repository\BusketContentRepository
     */
    protected $repository;

    public function __construct(BusketContentRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(int $busket_id = self::DEFAULT_BUSKET)
    {
        return $this->repository->findByBusket($busket_id);
    }
}