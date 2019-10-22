<?php

namespace Medialeads\Apiv3Client\Request;

use Medialeads\Apiv3Client\Common\RequestElementInterface;
use Medialeads\Apiv3Client\Exception\InvalidArgumentException;

class AllReference implements RequestElementInterface
{
    /**
     * @var array
     */
    private $allReferences;

    /**
     * @var string
     */
    private $type;

    /**
     * @param string $type
     * @param array $allReferences
     */
    public function __construct(string $type, array $allReferences)
    {
        $this->type = $type;
        $this->allReferences = $allReferences;
    }

    /**
     * @return array
     *
     * @throws InvalidArgumentException
     */
    public function export()
    {
        if (!in_array($this->type, ['strict', 'like'])) {
            throw new InvalidArgumentException(sprintf('Invalid type "%s"', $this->type));
        }

        return [
            'all_reference' => [
                'include' => $this->allReferences,
                'type' => $this->type
            ]
        ];
    }
}
