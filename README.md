# READ ME

Add the HasAttributes trait to your enum class

Attributes have to implement `AttributeContract` to be handle by this Trait

```php
<?php

namespace Jdefez\Enum\Tests\Fixtures;

use Jdefez\Enum\Attributes\Description;
use Jdefez\Enum\Attributes\Meta;
use Jdefez\Enum\Concerns\HasAttributes;
use Jdefez\Enum\Contracts\EnumContract;

enum Enum: string implements EnumContract
{
    use HasAttributes;

    #[Description('Active description')]
    #[Meta(['foo' => 'foo value', 'bar' => 'bar value'])]
    case Active = 'active';

    #[Description('Deactivated description')]
    case Deactivated = 'deactivated';
}
```
