<?php

namespace Medialeads\Normalizer;

use Medialeads\Apiv3Client\Model\AttributeGroup;

class AttributeGroupNormalizer
{
    /**
     * @param array $data
     *
     * @return AttributeGroup
     */
    public function denormalize(array $data)
    {
        $group = new AttributeGroup();
        $group->setId($data['id']);
        $group->setName($data['name']);
        $group->setSlug($data['slug']);
        $group->setAdditionalTextData($data['additional_text_data']);

        return $group;
    }
}
