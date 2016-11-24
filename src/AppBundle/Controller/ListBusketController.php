<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\UseCase\ListBusketUseCase;
use Symfony\Component\HttpFoundation\JsonResponse;

class ListBusketController extends Controller
{
    /**
     * @Route("/busket")
     * @throws \LogicException
     */
    public function listBusketAction()
    {
        $busketRepo = $this->getDoctrine()->getRepository('AppBundle:Busket');
        $useCase = new ListBusketUseCase($busketRepo);
        $busketContent = $useCase->execute();
        return new JsonResponse($busketContent);
    }
}
