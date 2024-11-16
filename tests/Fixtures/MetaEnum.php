<?php

namespace Jdefez\Enum\Tests\Fixtures;

use Jdefez\Enum\Attributes\Meta;
use Jdefez\Enum\Concerns\HasAttributes;

// TODO: their should be only one enum for all tests?
enum MetaEnum: string
{
    use HasAttributes;

    #[Meta(['foo' => 'foo value', 'bar' => 'bar value'])]
    case Active = 'active';

    case Deactivated = 'deactivated';
}
