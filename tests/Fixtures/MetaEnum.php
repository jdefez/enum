<?php

namespace Jdefez\Enum\Tests\Fixtures;

use Jdefez\Enum\Attributes\Description;
use Jdefez\Enum\Attributes\Meta;
use Jdefez\Enum\Concerns\HasAttributes;

enum MetaEnum: string
{
    use HasAttributes;

    #[Description('Active')]
    #[Meta(['foo' => 'foo value', 'bar' => 'bar value'])]
    case Active = 'active';

    #[Description('Deactivated')]
    case Deactivated = 'deactivated';
}
