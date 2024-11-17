<?php

namespace Jdefez\Enum\Attributes;

use Attribute;
use Jdefez\Enum\Contracts\AttributeContract;

#[Attribute(Attribute::TARGET_CLASS_CONSTANT)]
class Meta implements AttributeContract
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

    public function isMeta(string $key, mixed $value): bool
    {
        if (! array_key_exists($key, $this->data)) {
            return false;
        }

        return $this->data[$key] === $value;
    }
}
