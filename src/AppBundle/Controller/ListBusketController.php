<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\UseCase\ListBusketContentUseCase;
use Symfony\Component\HttpFoundation\JsonResponse;

class ListBusketController extends Controller
{
    /**
     * @Route("/busket/{busket_id}", requirements={"busket_id": "\d+"})
     * @param int $busket_id
     * @return JsonResponse
     * @throws \LogicException
     */
    public function listBusketAction(int $busket_id)
    {
        $busketRepo = $this->getDoctrine()->getRepository('AppBundle:BusketContent');
        $useCase = new ListBusketContentUseCase($busketRepo);
        $busketContent = $useCase->execute($busket_id);
        return new JsonResponse($busketContent);
    }
}
