<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InvoiceController extends AbstractController
{
    #[Route('/invoices', name: 'invoices')]
    public function index(): Response
    {

        $invoices = ["inv1", "inv2", "inv3", "inv3"];

        return $this->render('index.html.twig', array(
            'invoices' => $invoices
        ));
    }
}
