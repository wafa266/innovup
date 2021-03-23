<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Product
 *
 * @ORM\Table(name="product", indexes={@ORM\Index(name="category_id_fk_idx", columns={"category_id"})})
 * @ORM\Entity
 */
class Product
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=45, nullable=false)
     */
    private $name;

    /**
     * @var float|null
     *
     * @ORM\Column(name="price", type="float", precision=10, scale=0, nullable=true)
     */
    private $price;

    /**
     * @var float|null
     *
     * @ORM\Column(name="tva", type="float", precision=10, scale=0, nullable=true)
     */
    private $tva;

    /**
     * @var string|null
     *
     * @ORM\Column(name="barcode", type="string", length=250, nullable=true)
     */
    private $barcode;

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
     * @var \Category
     *
     * @ORM\ManyToOne(targetEntity="Category")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     * })
     */
    private $category;

    /**
     * @ORM\OneToMany(targetEntity="CustomerOrders", mappedBy="customer")
     */
    private $customerOrders;

    /**
     * @ORM\OneToMany(targetEntity="ProviderOrders", mappedBy="product")
     */
    private $providerOrders;

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

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(?float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getTva(): ?float
    {
        return $this->tva;
    }

    public function setTva(?float $tva): self
    {
        $this->tva = $tva;

        return $this;
    }

    public function getBarcode(): ?string
    {
        return $this->barcode;
    }

    public function setBarcode(?string $barcode): self
    {
        $this->barcode = $barcode;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
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

    public function getCategory(): ?Category
    {
        return  $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function __construct()
    {
        $this->customerOrders = new ArrayCollection();
        $this->providerOrders = new ArrayCollection();

    }

    /**
     * @return Collection|CustomerOrders[]
     */
    public function getCustomerOrders(): Collection
    {
        return $this->customerOrders;
    }

    public function addCustomerOrders(CustomerOrders $customerOrders): self
    {
        if (!$this->customerOrders->contains($customerOrders)) {
            $this->customerOrders[] = $customerOrders;
            $customerOrders->setProduct($this);
        }

        return $this;
    }

    public function removeCustomerOrders(CustomerOrders $customerOrders): self
    {
        if ($this->customerOrders->contains($customerOrders)) {
            $this->customerOrders->removeElement($customerOrders);
            // set the owning side to null (unless already changed)
            if ($customerOrders->getProduct() === $this) {
                $customerOrders->setProduct(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|ProviderOrders[]
     */
    public function getProviderOrders(): Collection
    {
        return $this->providerOrders;
    }

    public function addProviderOrders(ProviderOrders $providerOrders): self
    {
        if (!$this->providerOrders->contains($providerOrders)) {
            $this->providerOrders[] = $providerOrders;
            $providerOrders->setProduct($this);
        }

        return $this;
    }

    public function removeProviderOrders(ProviderOrders $providerOrders): self
    {
        if ($this->providerOrders->contains($providerOrders)) {
            $this->providerOrders->removeElement($providerOrders);
            // set the owning side to null (unless already changed)
            if ($providerOrders->getProduct() === $this) {
                $providerOrders->setProduct(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->name;
    }

}
