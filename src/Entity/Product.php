<?php

namespace App\Entity;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\ObjectType;
use Doctrine\ORM\Mapping as ORM;
use phpDocumentor\Reflection\Types\Object_;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\ChoiceList\ArrayChoiceList;
use Symfony\Component\Form\FormTypeInterface;

/**
 * Product
 *
 * @ORM\Table(name="product", indexes={@ORM\Index(name="category_id_fk_idx", columns={"category_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\ProductRepository")
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
        * @ORM\ManyToOne(targetEntity="CustomerOrders",inversedBy="products")
        */
       private $customerOrders;
       /**
        * @ORM\ManyToOne(targetEntity="ProviderOrders",inversedBy="products")
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
           return $this->category;
       }

       public function setCategory(?Category $category): self
       {
           $this->category = $category;

           return $this;
       }

       public function getProviderOrders(): ?ProviderOrders
       {
           return $this->providerOrders;
       }

       public function setProviderOrders(?ProviderOrders $providerOrders): self
       {
           $this->providerOrders = $providerOrders;

           return $this;
       }
       public function getCustomerOrders(): ?CustomerOrders
       {
           return $this->customerOrders;
       }

       public function setCustomerOrders(?CustomerOrders $customerOrders): self
       {
           $this->customerOrders = $customerOrders;

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
   }