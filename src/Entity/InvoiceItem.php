<?php

namespace App\Entity;

use App\Repository\InvoiceItemRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InvoiceItemRepository::class)]
class InvoiceItem
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'integer')]
    private $quantity;

    #[ORM\Column(type: 'string', length: 255)]
    private $unitPrice;

    #[ORM\Column(type: 'string', length: 255)]
    private $totalPrice;

    #[ORM\Column(type: 'string', length: 255)]
    private $tax;


    #[ORM\ManyToOne(targetEntity: "Invoice", inversedBy: 'items')]
    #[ORM\JoinColumn(name: 'invoice_id', referencedColumnName: 'id')]
    private $invoice;

    public function __construct()
    {
        $this->totalPrice = 2;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getUnitPrice(): ?int
    {
        return $this->unitPrice;
    }

    public function setUnitPrice(int $unitPrice): self
    {
        $this->unitPrice = $unitPrice;

        return $this;
    }

    public function getTotalPrice(): ?int
    {
        return $this->totalPrice;
    }

    public function setTotalPrice(int $totalPrice): self
    {
        $this->totalPrice = $totalPrice;

        return $this;
    }

    public function getTax(): ?int
    {
        return $this->tax;
    }

    public function setTax(int $tax): self
    {
        $this->tax = $tax;

        return $this;
    }


    // public function getInvoices(): Collection
    // {
    //     return $this->invoices;
    // }

    // public function addInvoice(Invoice $invoice): self
    // {
    //     if (!$this->invoices->contains($invoice)) {
    //         $this->invoices[] = $invoice;
    //         $invoice->addItem($this);
    //     }

    //     return $this;
    // }

    // public function removeInvoice(Invoice $invoice): self
    // {
    //     if ($this->invoices->removeElement($invoice)) {
    //         $invoice->removeItem($this);
    //     }

    //     return $this;
    // }


    public function setInvoice(Invoice $invoice): InvoiceItem {
        $this->invoice = $invoice;
        return $this;
    }


    public function getInvoice(): Invoice {
        return $this->invoice;
    }

}
