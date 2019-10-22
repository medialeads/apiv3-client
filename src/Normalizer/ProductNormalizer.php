<?php

namespace Medialeads\Apiv3Client\Normalizer;

use Medialeads\Apiv3Client\Model\Category;
use Medialeads\Apiv3Client\Model\Product;

class ProductNormalizer
{
    /**
     * @param array $data
     *
     * @return Product
     *
     * @throws \Exception
     */
    public function denormalize(array $data)
    {
        $product = new Product();
        $product->setId($data['id']);
        $product->setSupplierBaseReference($data['supplier_base_reference']);
        $product->setInternalReference($data['internal_reference']);
        $product->setCountryOfOrigin($data['country_of_origin']);
        $product->setUnionCustomsCode($data['union_customs_code']);
        $product->setHasMarking($data['has_marking']);
        $product->setLastIndexedAt(new \DateTime($data['last_indexed_at']));
        $product->setCreatedAt(new \DateTime($data['created_at']));
        $product->setUpdatedAt(new \DateTime($data['updated_at']));

        // images
        if (!empty($data['variant_images'])) {
            $imageNormalizer = new ImageNormalizer();
            foreach ($data['variant_images'] as $row) {
                $image = $imageNormalizer->denormalize($row);
                $product->addImage($image);

                if ($row['id'] == $data['main_variant_image_id']) {
                    $product->setMainImage($image);
                }
            }
        }

        if (!empty($data['variants'])) {
            $variantNormalizer = new VariantNormalizer();
            foreach ($data['variants'] as $row) {
                $variant = $variantNormalizer->denormalize($row);
                $product->addVariant($variant);

                if ($row['id'] == $data['main_variant_id']) {
                    $product->setMainVariant($variant);
                }
            }
        }

        if (!empty($data['categories'])) {
            $categoriesNormalizer = new CategoriesNormalizer();
            $product->setCategories($categoriesNormalizer->denormalize($data['categories']));

            /** @var Category $category */
            foreach ($product->getCategories() as &$category) {
                if ($category->getId() == $data['main_category_id']) {
                    $product->setMainCategory($category);
                }
            }
        }

        if (!empty($data['labels'])) {
            $labelNormalizer = new LabelNormalizer();
            foreach ($data['labels'] as $row) {
                $product->addLabel($labelNormalizer->denormalize($row));
            }
        }

        if (!empty($data['supplier'])) {
            $supplierNormalizer = new SupplierNormalizer();
            $product->setSupplier($supplierNormalizer->denormalize($data['supplier']));
        }

        if (!empty($data['brand'])) {
            $brandNormalizer = new BrandNormalizer();
            $product->setBrand($brandNormalizer->denormalize($data['brand']));
        }

        return $product;
    }
}
