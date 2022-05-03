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
    private $odbiorca;

    #[ORM\OneToMany(targetEntity: InvoiceItem::class, mappedBy: 'invoice', cascade: ['persist'])]
    private $items;

    public function __construct()
    {
        $this->items = new ArrayCollection();

        $time = new DateTime();
        $time->format("d.m.Y");
        $this->setOrderDate($time);

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

    public function getOdbiorca(): ?string
    {
        return $this->odbiorca;
    }

    public function setOdbiorca(string $odbiorca): self
    {
        $this->odbiorca = $odbiorca;

        return $this;
    }

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
}
