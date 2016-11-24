<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\UseCase\ListBusketContentUseCase;

class ViewBusketController extends Controller
{
    /**
     * @Route("/", name="homepage")
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \LogicException
     */
    public function indexAction()
    {
        $busketRepo = $this->getDoctrine()->getRepository('AppBundle:BusketContent');
        $useCase = new ListBusketContentUseCase($busketRepo);
        $busketContent = $useCase->execute();
        return $this->render('busket/view.html.twig', [
            'items' => $busketContent,
        ]);
    }
}
