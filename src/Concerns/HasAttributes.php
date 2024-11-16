<?php

namespace Jdefez\Enum\Concerns;

use Jdefez\Enum\Attributes\Meta;
use ReflectionAttribute;
use ReflectionEnumBackedCase;

trait HasAttributes
{
    public function __call(string $method, mixed $args = null): mixed
    {
        $ref = new ReflectionEnumBackedCase($this, $this->name);

        // can be filtered by interface if needed.
        $attributes = $ref->getAttributes(Meta::class);

        // find the attribute that implements this method
        $instance = $this->findAttributeInstanceByMethod($method, $attributes);

        if (! $instance) {
            // throw exception
        }

        return $instance->$method(...$args);
    }

    /**
     * @param  array<ReflectionAttribute>  $attributes
     */
    private function findAttributeInstanceByMethod(string $method, array $attributes): mixed
    {
        foreach ($attributes as $attribute) {
            $instance = $attribute->newInstance();
            if (method_exists($instance, $method)) {
                return $instance;
            }
        }

        return null;
    }
}
