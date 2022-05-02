<?php

namespace App\Controller;

use App\Entity\Invoice;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InvoiceController extends AbstractController
{

    private $em;

    public function __construct(EntityManagerInterface $em) {
        $this->em = $em;
    }

    #[Route('/invoices', name: 'invoices')]
    public function index(): Response
    {

        // $repository = $this->em->getRepository(Invoice::class);
        // $invoices = $repository->findAll();

        // dd($invoices);

        return $this->render('index.html.twig');
    }

}
