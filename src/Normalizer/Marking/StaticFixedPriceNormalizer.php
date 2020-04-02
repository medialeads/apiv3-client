<?php

namespace Medialeads\Apiv3Client\Normalizer\Marking;

use Medialeads\Apiv3Client\Model\Marking\StaticFixedPrice;

class StaticFixedPriceNormalizer
{
    public function denormalize(array $data): StaticFixedPrice
    {
        $staticFixedPrice = new StaticFixedPrice();
        $staticFixedPrice->setId($data['id']);
        $staticFixedPrice->setValue($data['value']);
        $staticFixedPrice->setReducedValue($data['reduced_value']);
        $staticFixedPrice->setCalculationValue($data['calculation_value']);
        $staticFixedPrice->setCondition($data['condition']);
        $staticFixedPrice->setTotalPrice((bool) $data['total_price']);

        $supplierProfileNormalizer = new SupplierProfileNormalizer();
        foreach ($data['supplier_profiles'] as $supplierProfile) {
            $staticFixedPrice->addSupplierProfile($supplierProfileNormalizer->denormalize($supplierProfile));
        }

        $markingFeeNormalizer = new MarkingFeeNormalizer();
        foreach ($data['marking_fees'] as $markingFee) {
            $staticFixedPrice->addMarkingFee($markingFeeNormalizer->denormalize($markingFee));
        }

        return $staticFixedPrice;
    }
}
