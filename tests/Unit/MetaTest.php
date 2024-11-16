<?php

use Jdefez\Enum\Tests\Fixtures\MetaEnum;

describe('Meta attribute', function () {
    it('should return the value of the key', function () {
        expect(MetaEnum::Active->getMeta('foo'))->toBe('foo value');
    });

    // it('should return the value of the key', function () {
    //     $meta = new Jdefez\Enum\Attributes\Meta(['foo' => 'foo value', 'bar' => 'bar value']);
    //     expect($meta->get('foo'))->toBe('foo value');
    //     expect($meta->get('bar'))->toBe('bar value');
    // });

    // it('should return null if the key does not exist', function () {
    //     $meta = new Jdefez\Enum\Attributes\Meta(['foo' => 'foo value', 'bar' => 'bar value']);
    //     expect($meta->get('baz'))->toBeNull();
    // });

    // it('should return all the data', function () {
    //     $meta = new Jdefez\Enum\Attributes\Meta(['foo' => 'foo value', 'bar' => 'bar value']);
    //     expect($meta->all())->toBe(['foo' => 'foo value', 'bar' => 'bar value']);
    // });
});
