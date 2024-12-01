<?php

use Jdefez\Enum\Tests\Fixtures\Statuses;

describe('Meta attribute', function () {
    test('method getMeta return the value are null',
        function (string $key, $expected) {
            expect(Statuses::Active->getMeta($key))
                ->toBe($expected);
        })
        ->with([
            ['foo', 'foo value'],
            ['bar', 'bar value'],
            ['booz', null],
        ]);

    test('method isMeta returns true if the meta equals the given value',
        function (string $key, string $value, bool $expected) {
            expect(Statuses::Active->isMeta($key, $value))
                ->toBe($expected);
        })
        ->with([
            ['foo', 'foo value', true],
            ['bar', 'bar value', true],
            ['foo', 'bar value', false],
            ['foor', 'bar value', false],
        ]);

    test('method allMeta returns an array with all meta data')
        ->expect(Statuses::Active->allMeta())
        ->toBeArray()
        ->toEqualCanonicalizing([
            'foo' => 'foo value',
            'bar' => 'bar value',
        ]);

    test('throws exception if the attribute was not found')
        ->expect(fn () => Statuses::Active->getMetas('baz'))
        ->throws(Exception::class);
});
