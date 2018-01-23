<?php


namespace MMI\Controller;

use MMI\Invoice\InvoiceType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class MainController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        $form = $this->createInvoiceForm();

        return $this->render('index.html.twig', ['form' => $form->createView()]);
    }

    /**
     * @Route("/post")
     */
    public function postAction(Request $request)
    {
        $form = $this->createInvoiceForm();
        $form->handleRequest($request);

        return $this->render('show.html.twig', ['invoice' => $form->getData()]);
    }

    private function createInvoiceForm()
    {
        return $this->createForm(InvoiceType::class, null, [
            'method' => 'POST',
            'action' => '/post'
        ]);
    }
}
