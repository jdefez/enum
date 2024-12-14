<?php

namespace Jdefez\Enum\Tests\Unit;

use Jdefez\Enum\Tests\Fixtures\Statuses;

describe('Find enum case', function () {
    it('should find a case by its description')
        ->expect(Statuses::findByDescription('Active description'))
        ->toBe(Statuses::Active);

    it('should return null if the description is not found')
        ->expect(Statuses::findByDescription('Unknown description'))
        ->toBeNull();
});
