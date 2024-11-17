<?php

namespace Jdefez\Enum\Attributes;

use Attribute;
use Jdefez\Enum\Contracts\AttributeContract;

#[Attribute(Attribute::TARGET_CLASS_CONSTANT)]
class Description implements AttributeContract
{
    public function __construct(
        public string $description,
    ) {}
}
