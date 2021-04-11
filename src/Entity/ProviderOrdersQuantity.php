<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class ProviderOrdersQuantity
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $quantity;

    /**
     * @ORM\ManyToOne(targetEntity=Product::class, inversedBy="providerOrdersQuantities", cascade={"persist"})
     */
    private $product;

    /**
     * @ORM\ManyToOne(targetEntity=ProviderOrders::class, inversedBy="providerOrdersQuantities", cascade={"persist"})
     */
    private $providerOrders;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getProduct(): ?Product
    {
        return $this->product;
    }

    public function setProduct(?Product $product): self
    {
        $this->product = $product;

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
}
