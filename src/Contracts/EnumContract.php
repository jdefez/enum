<?php

namespace Jdefez\Enum\Contracts;

use BackedEnum;
use Illuminate\Support\Collection;

interface EnumContract
{
    /**
     * @return array<int, mixed>
     */
    public static function values(): array;

    /**
     * @return Collection<BackedEnum>
     */
    public static function collect(): Collection;

    /**
     * @return Collection<object{value: mixed, description: string}>
     */
    public static function listValuesAndDescriptions(): Collection;

    public static function findByDescription(string $description): ?object;

    public static function findByMeta(string $key, mixed $value): ?object;
}
