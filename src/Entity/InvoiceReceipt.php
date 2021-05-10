<?php

namespace App\Entity;

use App\Repository\InvoiceReceiptRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 *   @UniqueEntity(
 *     fields={"providerOrders"},
 *     errorPath="providerOrders",
 *     message="invoice Recipt already created for this providerOrders ."
 * )
 * @ORM\Table(name="bon_de_reception")
 * @ORM\Entity(repositoryClass=InvoiceReceiptRepository::class)
 */
class InvoiceReceipt
{
    /**
     * @var int
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    public function getId(): ?int
    {
        return $this->id;
    }
    /**
     * @ORM\ManyToOne(targetEntity=ProviderOrders::class, inversedBy="invoice")
     */
    private $providerOrders;



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


