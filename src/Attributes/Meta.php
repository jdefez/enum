<?php

namespace Jdefez\Enum\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_CLASS_CONSTANT)]
class Meta
{
    /**
     * @param  array<array-key, mixed>  $data
     */
    public function __construct(
        public array $data,
    ) {}

    public function getMeta(string $key): mixed
    {
        return $this->data[$key] ?? null;
    }

    /**
     * @return array<array-key, mixed>
     */
    public function allMeta(): array
    {
        return $this->data;
    }
}
