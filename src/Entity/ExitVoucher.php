<?php

namespace App\Entity;

use App\Repository\ExitVoucherRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ExitVoucherRepository::class)
 */
class ExitVoucher
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @ORM\ManyToOne(targetEntity=CustomerOrders::class, inversedBy="invoice")
     */
    private $customerOrders;

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
