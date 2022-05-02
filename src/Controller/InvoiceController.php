<?php

namespace App\Controller;

use App\Entity\Invoice;
use App\Form\InvoiceFormType;
use App\Repository\InvoiceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InvoiceController extends AbstractController
{

    private $invoiceRepository;

    public function __construct(InvoiceRepository $invoiceRepository) {
        $this->invoiceRepository = $invoiceRepository;
    }

    #[Route('/invoices', methods: ['GET'], name: 'invoices')]
    public function index(): Response
    {

        $invoices = $this->invoiceRepository->findAll();

        return $this->render('invoices/index.html.twig', [
            'invoices' => $invoices
        ]);
    }

    #[Route('/invoices/create', name: 'create_invoice')]
    public function create(Request $request): Response {

        $invoice = new Invoice();
        $form = $this->createForm(InvoiceFormType::class, $invoice);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $newInvoice = $form->getData();

            dd($newInvoice);
            exit;

        }

        return $this->render('invoices/create.html.twig', [
            'form' => $form->createView()
        ]);

    }

    #[Route('/invoices/{id}', methods: ['GET'], name: 'invoice')]
    public function show($id): Response
    {

        $invoice = $this->invoiceRepository->find($id);

        return $this->render('invoices/show.html.twig', [
            'invoice' => $invoice
        ]);
    }

}
