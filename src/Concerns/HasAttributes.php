<?php

namespace Jdefez\Enum\Concerns;

use Closure;
use Illuminate\Support\Collection;
use Jdefez\Enum\Contracts\AttributeContract;
use Jdefez\Enum\Exceptions\AttributeNotFound;
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

        throw new AttributeNotFound('Attribute not found');
    }

    public static function findByDescription(string $description): ?object
    {
        return self::collect()
            ->first(fn ($item) => $item->description() === $description);
    }

    public static function findByMeta(string $key, mixed $value): ?object
    {
        return self::collect()
            ->first(function ($item) use ($key, $value) {
                try {
                    return $item->getMeta($key) === $value;
                } catch (AttributeNotFound $e) {
                    return null;
                }
            });
    }

    /**
     * @return Collection<object{value: mixed, description: string}>
     */
    public static function listValuesAndDescriptions(): Collection
    {
        return self::collect()
            ->map(fn ($item) => (object) [
                'value' => $item->value,
                'description' => $item->description(),
            ]);
    }

    /**
     * @return array<int, mixed>
     */
    public static function values(): array
    {
        return array_map(fn ($item) => $item->value, self::cases());
    }

    /**
     * @return Collection<BackedEnum>
     */
    public static function collect(): Collection
    {
        return new Collection(self::cases());
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
