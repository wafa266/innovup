<?php

namespace App\Entity;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\ObjectType;
use Doctrine\ORM\Mapping as ORM;
use phpDocumentor\Reflection\File;
use phpDocumentor\Reflection\Types\Object_;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\ChoiceList\ArrayChoiceList;
use Symfony\Component\Form\FormTypeInterface;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Product
 *
 * @ORM\Table(name="product", indexes={@ORM\Index(name="category_id_fk_idx", columns={"id"})})
 * @ORM\Entity(repositoryClass="App\Repository\ProductRepository")
 * @Vich\Uploadable
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
     * @var float|null
     *
     * @ORM\Column(name="price_excluding_tax", type="float", precision=10, scale=0, nullable=true)
     */
    private $priceExcludingTax;

    /**
     * @var float|null
     *
     * @ORM\Column(name="price_ttc", type="float", precision=10, scale=0, nullable=true)
     */
    private $priceTtc;

    /**
     * @var string|null
     *
     * @ORM\Column(name="barcode", type="string", length=250, nullable=true)
     */
    private $barcode;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @Vich\UploadableField(mapping="product_images", fileNameProperty="image")
     * @var File
     */

    private $imageFile;

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
     * @ORM\ManyToOne(targetEntity="Category", cascade={"persist"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     * })
     */
    private $category;

    /**
     * @ORM\OneToMany(targetEntity="ProviderOrdersProduct", mappedBy="product")
     */
    protected $providerOrdersProducts;
    /**
     * @ORM\OneToMany(targetEntity="CustomerOrdersProduct", mappedBy="product")
     */
    protected $customerOrdersProducts;

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
    public function getPriceExcludingTax(): ?float
    {
        return $this->priceExcludingTax;
    }

    public function setPriceExcludingTax(?float $priceExcludingTax): self
    {
        $this->priceExcludingTax = $priceExcludingTax;

        return $this;
    }
    public function getPriceTtc(): ?float
    {
        return $this->priceTtc;
    }

    public function setPrice_ttc(?float $priceTtc): self
    {
        $this->priceTtc = $priceTtc;

        return $this;
    }
    /**
     * @return string|null
     */
    public function getImage(): ?string
    {
        return $this->image;
    }

    /**
     * @param string|null $image
     * @return $this
     */
    public function setImage(?string $image): self
    {
        $this->image = $image;
        return $this;
    }

    /**
     * @return File|null
     */
    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    /**
     * @param File|null $imageFile
     */
    public function setImageFile(?File $imageFile = null)
    {
        $this->imageFile = $imageFile;

        if (null !== $imageFile) {
            $this->updatedAt = new \Datetime();
        }
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
        $this->customerOrdersProducts = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->name;
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

    public function setPriceTtc(?float $priceTtc): self
    {
        $this->priceTtc = $priceTtc;

        return $this;
    }

    /**
     * @return Collection|ProviderOrdersProduct[]
     */
    public function getProviderOrdersProducts(): Collection
    {
        return $this->providerOrdersProducts;
    }

    public function addProviderOrdersProduct(ProviderOrdersProduct $providerOrdersProduct): self
    {
        if (!$this->providerOrdersProducts->contains($providerOrdersProduct)) {
            $this->providerOrdersProducts[] = $providerOrdersProduct;
            $providerOrdersProduct->setProduct($this);
        }

        return $this;
    }

    public function removeProviderOrdersProduct(ProviderOrdersProduct $providerOrdersProduct): self
    {
        if ($this->providerOrdersProducts->removeElement($providerOrdersProduct)) {
            // set the owning side to null (unless already changed)
            if ($providerOrdersProduct->getProduct() === $this) {
                $providerOrdersProduct->setProduct(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|CustomerOrdersProduct[]
     */
    public function getCustomerOrdersProducts(): Collection
    {
        return $this->customerOrdersProducts;
    }

    public function addCustomerOrdersProduct(CustomerOrdersProduct $customerOrdersProduct): self
    {
        if (!$this->customerOrdersProducts->contains($customerOrdersProduct)) {
            $this->customerOrdersProducts[] = $customerOrdersProduct;
            $customerOrdersProduct->setProduct($this);
        }

        return $this;
    }

    public function removeCustomerOrdersProduct(CustomerOrdersProduct $customerOrdersProduct): self
    {
        if ($this->customerOrdersProducts->removeElement($customerOrdersProduct)) {
            // set the owning side to null (unless already changed)
            if ($customerOrdersProduct->getProduct() === $this) {
                $customerOrdersProduct->setProduct(null);
            }
        }

        return $this;
    }
}
