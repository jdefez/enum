<?php

namespace Jdefez\Enum\Tests\Unit;

use Jdefez\Enum\Tests\Fixtures\Statuses;

describe('EnumTest', function () {
    test('method Values lists all cases values')
        ->expect(Statuses::values())
        ->toEqualCanonicalizing([
            'deactivated',
            'deleted',
            'active',
        ]);

    test('method listValuesAndDescription')
        ->expect(Statuses::listValuesAndDescriptions())
        ->toArray()
        ->toEqualCanonicalizing([
            (object) ['value' => 'deactivated', 'description' => 'Deactivated description'],
            (object) ['value' => 'deleted', 'description' => 'Deleted description'],
            (object) ['value' => 'active', 'description' => 'Active description'],
        ]);
});
