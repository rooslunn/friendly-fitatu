<?php

namespace AppBundle\Controller;

use AppBundle\{
    Entity\Busket, Entity\BusketContent, Form\BusketContentType, Repository\BusketRepository
};
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\UseCase\AddItemUseCase;

class AddItemsController extends Controller
{
    protected function getProductsForChoice(): array
    {
        return $this->getDoctrine()->getRepository('AppBundle:Product')->findAll();
    }

    protected function getVatsForChoice(): array
    {
        return $this->getDoctrine()->getRepository('AppBundle:VatType')->findAll();
    }

    protected function getDefaultBusket(): Busket
    {
        return $this->getDoctrine()->getRepository('AppBundle:Busket')
            ->findDefaultBusket();
    }

    /**
     * @Route("/add", name="add_items")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \LogicException
     */
    public function addItemsAction(Request $request)
    {
        $newItem = new BusketContent();

        $form = $this->createForm(BusketContentType::class, $newItem, [
            'products' => $this->getProductsForChoice(),
            'vat_types' => $this->getVatsForChoice(),
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $useCase = new AddItemUseCase($this->getDoctrine()->getManager());
            $useCase->execute($this->getDefaultBusket(), $newItem);
            return $this->redirectToRoute('homepage');
        }

        return $this->render('busket/new.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
