<?php

namespace App\Controller;

use App\Entity\Invoice;
use App\Entity\InvoiceItem;
use App\Form\InvoiceFormType;
use App\Repository\InvoiceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InvoiceController extends AbstractController
{

    private $em;
    private $invoiceRepository;

    public function __construct(InvoiceRepository $invoiceRepository, EntityManagerInterface $em) {
        $this->invoiceRepository = $invoiceRepository;
        $this->em = $em;
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

            $this->em->persist($newInvoice);

            // $this->em->persist($invoice);

            $this->em->flush();

            return $this->redirectToRoute('invoices');

        }

        return $this->render('invoices/create.html.twig', [
            'form' => $form->createView()
        ]);

    }

    #[Route('/invoices/delete/{id}', methods: ['GET', 'DELETE'], name: 'delete_invoice')]
    public function delete($id): Response {
        $invoice = $this->invoiceRepository->find($id);
        $this->em->remove($invoice);
        $this->em->flush();

        return $this->redirectToRoute('invoices');
    }

    #[Route('/invoices/{id}', methods: ['GET'], name: 'show_invoice')]
    public function show($id): Response
    {

        $invoice = $this->invoiceRepository->find($id);

        return $this->render('invoices/show.html.twig', [
            'invoice' => $invoice
        ]);
    }

}
