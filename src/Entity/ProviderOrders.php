<?php

namespace App\Entity;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use phpDocumentor\Reflection\Types\Object_;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

/**
 * ProviderOrders
 *
 * @ORM\Table(name="provider_orders", indexes={@ORM\Index(name="product_id_fk_1_idx", columns={"id"}), @ORM\Index(name="provider_id_fk_idx", columns={"provider_id"})})
 * @ORM\Entity
 */
class ProviderOrders
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;
    /**
     * @var string|null
     *
     * @ORM\Column(name="reference", type="string", length=100, nullable=true)
     */
    private $reference;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="is_paid", type="boolean", nullable=true)
     */
    private $isPaid = '0';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=true)
     */
    private $createdAt;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="deleted_at", type="datetime", nullable=true)
     */
    private $deletedAt;

    /**
     * @ORM\ManyToMany(targetEntity=Product::class, inversedBy="providersOrders")
     */
    private $products;

    /**
     * @var \Provider
     *
     * @ORM\ManyToOne(targetEntity="Provider")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="provider_id", referencedColumnName="id")
     * })
     */
    private $provider;

    /**
     * @ORM\OneToMany(targetEntity=ProviderOrdersQuantity::class, mappedBy="providerOrders")
     */
    private $providerOrdersQuantities;

    /**
     * @ORM\OneToMany(targetEntity=InvoiceReceipt::class, mappedBy="providerOrders")
     */
    private $invoice;


    public function __construct()
    {
        $this->products = new ArrayCollection();
        $this->providerOrdersQuantities = new ArrayCollection();
        $this->invoice = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIsPaid(): ?bool
    {
        return $this->isPaid;
    }

    public function setIsPaid(?bool $isPaid): self
    {
        $this->isPaid = $isPaid;

        return $this;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(?string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt ?? new DateTime();
    }

    public function setCreatedAt(?\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt ?? new DateTime();
    }

    public function setUpdatedAt(?\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getDeletedAt(): ?\DateTimeInterface
    {
        return $this->deletedAt;
    }

    public function setDeletedAt(?\DateTimeInterface $deletedAt): self
    {
        $this->deletedAt = $deletedAt;

        return $this;
    }

    public function getProvider(): ?Provider
    {
        return $this->provider;
    }

    public function setProvider(?Provider $provider): self
    {
        $this->provider = $provider;

        return $this;
    }

    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function updateTimestamps(): void
    {
        $now = new DateTime();
        $this->setUpdatedAt($now);
        if ($this->getId() === null) {
            $this->setCreatedAt($now);
        }
    }

    /**
     * @return Collection|Product[]
     */
    public function getProducts(): Collection
    {
        return $this->products;
    }

    public function addProduct(Product $product): self
    {
        if (!$this->products->contains($product)) {
            $this->products[] = $product;
        }

        return $this;
    }

    public function removeProduct(Product $product): self
    {
        $this->products->removeElement($product);

        return $this;
    }

    public function __toString() {
        if(is_null($this->reference)) {
            return 'NULL';
        }
        return $this->reference;
    }


    /**
     * @return Collection|ProviderOrdersQuantity[]
     */
    public function getProviderOrdersQuantities(): Collection
    {
        return $this->providerOrdersQuantities;
    }

    public function addProviderOrdersQuantity(ProviderOrdersQuantity $providerOrdersQuantity): self
    {
        if (!$this->providerOrdersQuantities->contains($providerOrdersQuantity)) {
            $this->providerOrdersQuantities[] = $providerOrdersQuantity;
            $providerOrdersQuantity->setProviderOrder($this);
        }

        return $this;
    }

    public function removeProviderOrdersQuantity(ProviderOrdersQuantity $providerOrdersQuantity): self
    {
        if ($this->providerOrdersQuantities->removeElement($providerOrdersQuantity)) {
            // set the owning side to null (unless already changed)
            if ($providerOrdersQuantity->getProviderOrder() === $this) {
                $providerOrdersQuantity->setProviderOrder(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|InvoiceReceipt[]
     */
    public function getInvoice(): ?Collection
    {
        return $this->invoice;
    }

    public function addInvoice(InvoiceReceipt $invoiceReceipt): self
    {
        if (!$this->invoice->contains($invoiceReceipt)) {
            $this->invoice[] = $invoiceReceipt;
            $invoiceReceipt->setProviderOrder($this);
        }

        return $this;
    }

    public function removeInvoice(InvoiceReceipt $invoiceReceipt): self
    {
        if ($this->invoice->removeElement($invoiceReceipt)) {
            // set the owning side to null (unless already changed)
            if ($invoiceReceipt->getProviderOrder() === $this) {
                $invoiceReceipt->setProviderOrder(null);
            }
        }
        return $this;
    }
}
