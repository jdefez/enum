<?php

use Jdefez\Enum\Tests\Fixtures\MetaEnum;

describe('Meta attribute', function () {
    test('getMeta', function () {
        expect(MetaEnum::Active->getMeta('foo'))->toBe('foo value');
    });

    test('isMeta', function (string $key, string $value, bool $expected) {
        expect(MetaEnum::Active->isMeta($key, $value))->toBe($expected);
    })
        ->with([
            ['foo', 'foo value', true],
            ['bar', 'bar value', true],
            ['foo', 'bar value', false],
            ['foor', 'bar value', false],
        ]);

    test('allMeta', function () {
        expect(MetaEnum::Active->allMeta())->toEqualCanonicalizing([
            'foo' => 'foo value',
            'bar' => 'bar value',
        ]);
    });

    test('throws exception if the attribute was not found', function () {
        MetaEnum::Active->getMetas('baz');
    })
        ->throws(Exception::class);
});
