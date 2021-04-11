<?php

namespace App\Entity;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use phpDocumentor\Reflection\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * CustomerOrders
 *
 * @ORM\Table(name="customer_orders", indexes={@ORM\Index(name="product_id_fk_idx", columns={"id"}), @ORM\Index(name="customer_id_fk_idx", columns={"customer_id"})})
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */

class CustomerOrders
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
     * @var \Customer
     *
     * @ORM\ManyToOne(targetEntity="Customer")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="customer_id", referencedColumnName="id")
     * })
     */
    private $customer;
    /**
     * @ORM\ManyToMany(targetEntity=Product::class, inversedBy="customerOrders")
     */
    private $products;
    /**
     * @ORM\OneToMany(targetEntity=CustomerOrdersQuantity::class, mappedBy="customerOrders")
     */
    private $customerOrdersQuantities;

    public function __construct()
    {
        $this->products = new ArrayCollection();
        $this->customerOrdersQuantities = new ArrayCollection();
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

    public function getCustomer(): ?Customer
    {
        return $this->customer;
    }

    public function setCustomer(?Customer $customer): self
    {
        $this->customer = $customer;

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
     * @return Collection|CustomerOrdersQuantity[]
     */
    public function getCustomerOrdersProducts(): Collection
    {
        return $this->customerOrdersProducts;
    }

    public function addCustomerOrdersProduct(CustomerOrdersQuantity $customerOrdersProduct): self
    {
        if (!$this->customerOrdersProducts->contains($customerOrdersProduct)) {
            $this->customerOrdersProducts[] = $customerOrdersProduct;
            $customerOrdersProduct->setCustomerOrders($this);
        }

        return $this;
    }

    public function removeCustomerOrdersProduct(CustomerOrdersQuantity $customerOrdersProduct): self
    {
        if ($this->customerOrdersProducts->removeElement($customerOrdersProduct)) {
            // set the owning side to null (unless already changed)
            if ($customerOrdersProduct->getCustomerOrders() === $this) {
                $customerOrdersProduct->setCustomerOrders(null);
            }
        }

        return $this;
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

    public function __toString()
    {
        return 'product';
    }

    /**
     * @return Collection|CustomerOrdersQuantity[]
     */
    public function getCustomerOrdersQuantities(): Collection
    {
        return $this->customerOrdersQuantities;
    }

    public function addCustomerOrdersQuantity(CustomerOrdersQuantity $customerOrdersQuantity): self
    {
        if (!$this->customerOrdersQuantities->contains($customerOrdersQuantity)) {
            $this->customerOrdersQuantities[] = $customerOrdersQuantity;
            $customerOrdersQuantity->setCustomerOrders($this);
        }

        return $this;
    }

    public function removeCustomerOrdersQuantity(CustomerOrdersQuantity $customerOrdersQuantity): self
    {
        if ($this->customerOrdersQuantities->removeElement($customerOrdersQuantity)) {
            // set the owning side to null (unless already changed)
            if ($customerOrdersQuantity->getCustomerOrders() === $this) {
                $customerOrdersQuantity->setCustomerOrders(null);
            }
        }

        return $this;
    }
}