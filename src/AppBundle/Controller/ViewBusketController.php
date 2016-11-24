<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Busket;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\UseCase\ListBusketContentUseCase;

class ViewBusketController extends Controller
{
    protected function getDefaultBusket(): Busket
    {
        return $this->getDoctrine()->getRepository('AppBundle:Busket')->findDefaultBusket();
    }

    /**
     * @Route("/", name="homepage")
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \LogicException
     */
    public function indexAction()
    {
        $busketRepo = $this->getDoctrine()->getRepository('AppBundle:BusketContent');
        $useCase = new ListBusketContentUseCase($busketRepo);
        $busketContent = $useCase->execute($this->getDefaultBusket());
        return $this->render('busket/view.html.twig', [
            'items' => $busketContent,
        ]);
    }
}
