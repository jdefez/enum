<?php

namespace Jdefez\Enum\Tests\Unit;

use Jdefez\Enum\Tests\Fixtures\Statuses;

describe('Find enum case', function () {
    it('should find a case by its meta')
        ->expect(Statuses::findByMeta('foo', 'hello'))
        ->toBe(Statuses::Deleted);

    it('should return null if the meta is not found')
        ->expect(Statuses::findByMeta('foo', 'Unknown meta'))
        ->toBeNull();
});
