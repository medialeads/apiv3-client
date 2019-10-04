<?php

namespace Medialeads\Normalizer;


use Medialeads\Apiv3Client\Model\Label;

class LabelNormalizer
{
    /**
     * @param array $data
     *
     * @return Label
     */
    public function denormalize(array $data)
    {
        $label = new Label();
        $label->setId($data['id']);
        $label->setName($data['name']);
        $label->setSlug($data['slug']);

        return $label;
    }
}
