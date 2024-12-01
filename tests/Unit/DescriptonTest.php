<?php

namespace Jdefez\Enum\Tests\Unit;

use Exception;
use Jdefez\Enum\Tests\Fixtures\Statuses;

describe('Description attribute', function () {
    test('method descripiton returns the description property of the attribute')
        ->expect(Statuses::Active)
        ->description()
        ->toBe('Active description');

    test('throws an exception if the attribute was not found')
        ->expect(fn () => Statuses::Active)
        ->wrongMethod()
        ->throws(Exception::class);
});
