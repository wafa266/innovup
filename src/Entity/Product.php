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
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Product
 *
 * @ORM\Table(name="product", indexes={@ORM\Index(name="category_id_fk_idx", columns={"id"})})
 * @ORM\Entity(repositoryClass="App\Repository\ProductRepository")
 * @Vich\Uploadable
 */
class Product

{  public $value;
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
    /**
     * @Assert\Length(
     *      min = 3,
     *      max = 50,
     *      minMessage = "Your first name must be at least {{ limit }} characters long Wafe",
     *      maxMessage = "Your first name cannot be longer than {{ limit }} characters"
     * )
     *
     * @ORM\Column(name="name", type="string", length=45, nullable=false)
     * @Assert\NotBlank
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
     * @var float|null
     *
     * @ORM\Column(name="Benefice_margin", type="float", precision=10, scale=0, nullable=true)
     *
     */
    private $BeneficeMargin;
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
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\NotBlank
     */
    private $quantity;

    /**
     * @var \Category
     *
     * @ORM\ManyToOne(targetEntity="Category", cascade={"persist"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     * })
     * @Assert\NotBlank
     */
    private $category;

    /**
     * @ORM\ManyToMany(targetEntity=ProviderOrders::class, mappedBy="products")
     */
    private $providersOrders;

    /**
     * @ORM\ManyToMany(targetEntity=CustomerOrders::class, mappedBy="products", cascade={"persist"})
     */
    private $customerOrders;

    /**
     * @ORM\OneToMany(targetEntity="CustomerOrdersQuantity", mappedBy="product")
     */
    protected $customerOrdersQuantities;

    /**
     * @ORM\OneToMany(targetEntity=ProviderOrdersQuantity::class, mappedBy="product")
     */
    private $providerOrdersQuantities;
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

    public function __construct()
    {
        $this->customerOrdersQuantities = new ArrayCollection();
        $this->providersOrders = new ArrayCollection();
        $this->customerOrders = new ArrayCollection();
        $this->providerOrdersQuantities = new ArrayCollection();
        $this->setCreatedAt(new \DateTime());
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
    public function getBeneficeMargin(): ?float
    {
        return $this->BeneficeMargin;
    }

    public function setBeneficeMargin(?float $BeneficeMargin): self
    {
        $this->BeneficeMargin = $BeneficeMargin;

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
            $customerOrdersProduct->setProduct($this);
        }

        return $this;
    }

    public function removeCustomerOrdersProduct(CustomerOrdersQuantity $customerOrdersProduct): self
    {
        if ($this->customerOrdersProducts->removeElement($customerOrdersProduct)) {
            // set the owning side to null (unless already changed)
            if ($customerOrdersProduct->getProduct() === $this) {
                $customerOrdersProduct->setProduct(null);
            }
        }

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(?int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }
    /**
     * @return Collection|ProviderOrders[]
     */
    public function getProvidersOrders(): Collection
    {
        return $this->providersOrders;
    }

    public function addProvidersOrder(ProviderOrders $providersOrder): self
    {
        if (!$this->providersOrders->contains($providersOrder)) {
            $this->providersOrders[] = $providersOrder;
            $providersOrder->addProduct($this);
        }

        return $this;
    }

    public function removeProvidersOrder(ProviderOrders $providersOrder): self
    {
        if ($this->providersOrders->removeElement($providersOrder)) {
            $providersOrder->removeProduct($this);
        }

        return $this;
    }

    /**
     * @return Collection|ProviderOrdersQuantity[]
     */
    public function getProductProviderOrders(): Collection
    {
        return $this->productProviderOrders;
    }

    public function addProductProviderOrder(ProviderOrdersQuantity $productProviderOrder): self
    {
        if (!$this->productProviderOrders->contains($productProviderOrder)) {
            $this->productProviderOrders[] = $productProviderOrder;
            $productProviderOrder->setProduct($this);
        }

        return $this;
    }

    public function removeProductProviderOrder(ProviderOrdersQuantity $productProviderOrder): self
    {
        if ($this->productProviderOrders->removeElement($productProviderOrder)) {
            // set the owning side to null (unless already changed)
            if ($productProviderOrder->getProduct() === $this) {
                $productProviderOrder->setProduct(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|CustomerOrders[]
     */
    public function getCustomerOrders(): Collection
    {
        return $this->customerOrders;
    }

    public function addCustomerOrder(CustomerOrders $customerOrder): self
    {
        if (!$this->customerOrders->contains($customerOrder)) {
            $this->customerOrders[] = $customerOrder;
            $customerOrder->addProduct($this);
        }

        return $this;
    }

    public function removeCustomerOrder(CustomerOrders $customerOrder): self
    {
        if ($this->customerOrders->removeElement($customerOrder)) {
            $customerOrder->removeProduct($this);
        }

        return $this;
    }

    /**
     * @return Collection|CustomerOrdersQuantity[]
     */
    public function getCustomerOrdersQuantity(): Collection
    {
        return $this->customerOrdersQuantities;
    }

    public function addCustomerOrdersQuantity(CustomerOrdersQuantity $customerOrdersQuantity): self
    {
        if (!$this->customerOrdersQuantities->contains($customerOrdersQuantity)) {
            $this->customerOrdersQuantities[] = $customerOrdersQuantity;
            $customerOrdersQuantity->setProduct($this);
        }

        return $this;
    }

    public function removeCustomerOrdersQuantity(CustomerOrdersQuantity $customerOrdersQuantity): self
    {
        if ($this->customerOrdersQuantities->removeElement($customerOrdersQuantity)) {
            // set the owning side to null (unless already changed)
            if ($customerOrdersQuantity->getProduct() === $this) {
                $customerOrdersQuantity->setProduct(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|ProviderOrdersQuantity[]
     */
    public function getProviderOrdersQuantities(): Collection
    {
        return $this->providerOrdersQuantities;
    }

    public function addProviderOrdersQuantities(ProviderOrdersQuantity $providerOrdersQuantity): self
    {
        if (!$this->providerOrdersQuantities->contains($providerOrdersQuantity)) {
            $this->providerOrdersQuantities[] = $providerOrdersQuantity;
            $providerOrdersQuantity->setProduct($this);
        }

        return $this;
    }

    public function removeProviderOrdersQuantities(ProviderOrdersQuantity $providerOrdersQuantity): self
    {
        if ($this->providerOrdersQuantities->removeElement($providerOrdersQuantity)) {
            // set the owning side to null (unless already changed)
            if ($providerOrdersQuantity->getProduct() === $this) {
                $providerOrdersQuantity->setProduct(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|CustomerOrdersQuantity[]
     */
    public function getCustomerOrdersQuantities(): Collection
    {
        return $this->customerOrdersQuantities;
    }


}
