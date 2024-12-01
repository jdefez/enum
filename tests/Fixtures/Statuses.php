<?php

namespace Jdefez\Enum\Tests\Fixtures;

use Jdefez\Enum\Attributes\Description;
use Jdefez\Enum\Attributes\Meta;
use Jdefez\Enum\Concerns\HasAttributes;
use Jdefez\Enum\Contracts\EnumContract;

enum Statuses: string implements EnumContract
{
    use HasAttributes;

    #[Description('Active description')]
    #[Meta(['foo' => 'foo value', 'bar' => 'bar value'])]
    case Active = 'active';

    #[Description('Deactivated description')]
    case Deactivated = 'deactivated';

    #[Description('Deleted description')]
    case Deleted = 'deleted';
}
