<?php

namespace App\Entity;

use App\Repository\InvoiceRepository;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: InvoiceRepository::class)]
class Invoice
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank]
    #[Assert\Length(min: 3)]
    private $title;

    #[ORM\Column(type: 'date')]
    private $order_date;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank]
    private $receiverName;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank]
    private $receiverStreet;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank]
    private $receiverZIPcode;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank]
    private $senderName;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank]
    private $senderStreet;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank]
    private $senderZIPcode;


    #[ORM\OneToMany(targetEntity: InvoiceItem::class, mappedBy: 'invoice', cascade: ['persist', 'remove'])]
    private $items;

    public function __construct()
    {
        $this->items = new ArrayCollection();

        $time = new DateTime();
        $time->format("d.m.Y");
        $this->setOrderDate($time);

        $this->setTitle(uniqid() . "/" . $time->format("d.m.Y"));

    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getorder_date(): ?\DateTimeInterface
    {
        return $this->order_date;
    }

    public function setOrderDate(\DateTimeInterface $order_date): self
    {
        $this->order_date = $order_date;

        return $this;
    }

    public function getReceiverName(): ?string
    {
        return $this->receiverName;
    }

    public function setReceiverName(string $receiverName): self
    {
        $this->receiverName = $receiverName;

        return $this;
    }

    public function getReceiverStreet(): ?string
    {
        return $this->receiverStreet;
    }

    public function setReceiverStreet(string $receiverStreet): self
    {
        $this->receiverStreet = $receiverStreet;

        return $this;
    }

    public function getReceiverZIPcode(): ?string
    {
        return $this->receiverZIPcode;
    }

    public function setReceiverZIPcode(string $receiverZIPcode): self
    {
        $this->receiverZIPcode = $receiverZIPcode;

        return $this;
    }

    ////////////////////////////////////////

    public function getSenderName(): ?string
    {
        return $this->senderName;
    }

    public function setSenderName(string $senderName): self
    {
        $this->senderName = $senderName;

        return $this;
    }

    public function getSenderStreet(): ?string
    {
        return $this->senderStreet;
    }

    public function setSenderStreet(string $senderStreet): self
    {
        $this->senderStreet = $senderStreet;

        return $this;
    }

    public function getSenderZIPcode(): ?string
    {
        return $this->senderZIPcode;
    }

    public function setSenderZIPcode(string $senderZIPcode): self
    {
        $this->senderZIPcode = $senderZIPcode;

        return $this;
    }

    ///////////////////////////////////////


    public function getItems(): Collection
    {
        return $this->items;
    }

    public function addItem(InvoiceItem $item): Invoice
    {
        // if (!$this->items->contains($item)) {
        //     $this->items[] = $item;
        // }
        $this->items[] = $item;
        $item->setInvoice($this);

        return $this;
    }

    public function removeItem(InvoiceItem $item)
    {
        $this->items->removeElement($item);

        // return $this;
    }

    // public function getFullPrice(): float {
    //     $sum = 0;
    //     $items = $this->getItems();
    //     foreach($items as $item) {
    //         $sum = ($item->getTax() / 100 * $item->getQuantity() * $item->getUnitPrice);
    //     }

    //     return  $sum;
    // }
}
