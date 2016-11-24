<?php
/**
 * Created by PhpStorm.
 * User: russ
 * Date: 11/23/16
 * Time: 9:05 PM
 */

namespace AppBundle\UseCase;

use AppBundle\Repository\BusketRepository;

class ListBusketUseCase
{
    /**
     * @var \AppBundle\Repository\BusketRepository
     */
    protected $repository;

    public function __construct(BusketRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute()
    {
        return $this->repository->findAll();
    }
}