<?php

namespace Jdefez\Enum\Concerns;

use Closure;
use Exception;
use Jdefez\Enum\Contracts\AttributeContract;
use ReflectionAttribute;
use ReflectionEnumBackedCase;

trait HasAttributes
{
    public function __call(string $method, mixed $args = null): mixed
    {
        $attributes = (new ReflectionEnumBackedCase($this, $this->name))
            ->getAttributes(AttributeContract::class, ReflectionAttribute::IS_INSTANCEOF);

        $instance = $this->find($attributes, function ($instance) use ($method) {
            return property_exists($instance, $method);
        });

        if ($instance) {
            return $instance->{$method};
        }

        $instance = $this->find($attributes, function ($instance) use ($method) {
            return method_exists($instance, $method);
        });

        if ($instance) {
            return $instance->{$method}(...$args);
        }

        throw new Exception('Attribute not found');
    }

    /**
     * @param  array<ReflectionAttribute>  $attributes
     * @param  Closure(object, string): bool  $callback
     */
    private function find(array $attributes, Closure $callback): ?object
    {
        foreach ($attributes as $attribute) {
            $instance = $attribute->newInstance();
            $found = $callback($attribute->newInstance());

            if ($found) {
                return $instance;
            }
        }

        return null;
    }
}
