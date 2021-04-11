<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class CustomerOrdersQuantity
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
     * @ORM\ManyToOne(targetEntity=Product::class, inversedBy="customerOrdersQuantities")
     */
    private $product;

    /**
     * @ORM\ManyToOne(targetEntity=CustomerOrders::class, inversedBy="customerOrdersQuantities")
     */
    private $customerOrders;

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

    public function getCustomerOrders(): ?CustomerOrders
    {
        return $this->customerOrders;
    }

    public function setCustomerOrders(?CustomerOrders $customerOrders): self
    {
        $this->customerOrders = $customerOrders;

        return $this;
    }
}
