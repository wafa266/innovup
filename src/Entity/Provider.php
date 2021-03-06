<?php

namespace App\Entity;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use phpDocumentor\Reflection\File;
use phpDocumentor\Reflection\Types\Object_;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Provider
 *
 * @ORM\Table(name="provider")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Provider
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
     * @ORM\Column(name="first_name", type="string", length=45, nullable=true)
     */
    private $firstName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="last_name", type="string", length=45, nullable=true)
     */
    private $lastName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="email", type="string", length=45, nullable=true)
     */
    private $email;

    /**
     * @var string|null
     *
     * @ORM\Column(name="address", type="string", length=45, nullable=true)
     */
    private $address;

    /**
     * @var string|null
     *
     * @ORM\Column(name="phone", type="string", length=45, nullable=true)
     */
    private $phone;
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @Vich\UploadableField(mapping="customers",fileNameProperty="image")
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
     * @ORM\OneToMany(targetEntity="ProviderOrders", mappedBy="provider")
     */
    private $providerOrders;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(?string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(?string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;

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

    public function __construct()
    {
        $this->customerOrders = new ArrayCollection();
        $this->providerOrders = new ArrayCollection();

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
            $providerOrders->setProvider($this);
        }

        return $this;
    }

    public function removeProviderOrders(ProviderOrders $providerOrders): self
    {
        if ($this->providerOrders->contains($providerOrders)) {
            $this->providerOrders->removeElement($providerOrders);
            // set the owning side to null (unless already changed)
            if ($providerOrders->getProvider() === $this) {
                $providerOrders->setProvider(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->firstName . ' - ' . $this->lastName;
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

    public function addProviderOrder(ProviderOrders $providerOrder): self
    {
        if (!$this->providerOrders->contains($providerOrder)) {
            $this->providerOrders[] = $providerOrder;
            $providerOrder->setProvider($this);
        }

        return $this;
    }

    public function removeProviderOrder(ProviderOrders $providerOrder): self
    {
        if ($this->providerOrders->removeElement($providerOrder)) {
            // set the owning side to null (unless already changed)
            if ($providerOrder->getProvider() === $this) {
                $providerOrder->setProvider(null);
            }
        }

        return $this;
    }


}
