<?php

namespace Medialeads\Apiv3Client\Model;

use Medialeads\Apiv3Client\Common\Collection;

class DynamicVariablePriceHolder
{
    /** @var string */
    private $id;

    /** @var string */
    private $condition;

    /** @var bool */
    private $totalPrice;

    /** @var Collection */
    private $markingFees;

    /** @var SupplierProfile */
    private $supplierProfile;

    /** @var Collection */
    private $dynamicVariablePrices;

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getCondition(): string
    {
        return $this->condition;
    }

    public function setCondition(string $condition): self
    {
        $this->condition = $condition;

        return $this;
    }

    public function isTotalPrice(): bool
    {
        return $this->totalPrice;
    }

    public function setTotalPrice(bool $totalPrice): self
    {
        $this->totalPrice = $totalPrice;

        return $this;
    }

    public function getMarkingFees(): Collection
    {
        return $this->markingFees;
    }

    public function setMarkingFees(Collection $markingFees): self
    {
        $this->markingFees = $markingFees;

        return $this;
    }

    public function getSupplierProfile(): SupplierProfile
    {
        return $this->supplierProfile;
    }

    public function setSupplierProfile(SupplierProfile $supplierProfile): self
    {
        $this->supplierProfile = $supplierProfile;

        return $this;
    }

    public function getDynamicVariablePrices(): Collection
    {
        return $this->dynamicVariablePrices;
    }

    public function setDynamicVariablePrices(Collection $dynamicVariablePrices): self
    {
        $this->dynamicVariablePrices = $dynamicVariablePrices;

        return $this;
    }
}
