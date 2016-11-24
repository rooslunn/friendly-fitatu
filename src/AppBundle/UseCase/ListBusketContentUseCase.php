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
    /**
     * @var \AppBundle\Repository\BusketContentRepository
     */
    protected $repository;

    public function __construct(BusketContentRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(int $busket_id)
    {
        return $this->repository->findByBusket($busket_id);
    }
}