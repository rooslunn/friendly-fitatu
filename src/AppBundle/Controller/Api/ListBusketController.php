<?php

namespace AppBundle\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\UseCase\ListBusketContentUseCase;
use Symfony\Component\HttpFoundation\JsonResponse;

class ListBusketController extends Controller
{
    /**
     * @Route("/api/busket/{busket_id}", requirements={"busket_id": "\d+"})
     * @param int $busket_id
     * @return JsonResponse
     * @throws \LogicException
     */
    public function listBusketAction(int $busket_id)
    {
        $busketRepo = $this->getDoctrine()->getRepository('AppBundle:BusketContent');
        $useCase = new ListBusketContentUseCase($busketRepo);
        $busketContent = $useCase->execute(
            $this->getDoctrine()->getRepository('AppBundle:Busket')->findDefaultBusket());
        return new JsonResponse($busketContent);
    }
}
