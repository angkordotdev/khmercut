<?php

declare(strict_types=1);

use Angkor\Khmercut\Exceptions\BinaryNotFoundException;
use Angkor\Khmercut\Tokenizer;

test('Get tokenizer instance from container', function () {

    expect(config()->get('tokenizer.binary_path'))->not->toBeNull();
    $tokenizer = app()->make(Tokenizer::class);
    expect($tokenizer)->toBeInstanceOf(Tokenizer::class);

});

test('it raises exception if binary not found', function () {

    $tokenizer = app()->make(Tokenizer::class);

    $this->expectException(BinaryNotFoundException::class);

    $tokenizer::binaryPath('/path/to/mock/khnmercut');

});

test('it tokenizes khmer', function () {

    $token = Tokenizer::make('សួស្តីស្រីស្អាត');
    expect($token)->toBe("សួស្តី\u{200B}ស្រី\u{200B}ស្អាត");

});

test('it does not tokenize', function () {

    $languages = [
        "J'aime le Cambodge",
        'I love Cambodia',
        '我爱柬埔寨',
        'Tôi yêu Campuchia',
        'ฉันรักกัมพูชา',
    ];

    foreach ($languages as $language) {
        $token = Tokenizer::make($language);
        expect($token)->toBe($language);
    }
});

test('it tokenizes khmer and not english', function () {

    $expected = "Pretty girl សួស្តី\u{200B}ស្រី\u{200B}ស្អាត Hello World សួស្តី\u{200B}ពិភពលោក";
    $token    = Tokenizer::make('Pretty girl សួស្តីស្រីស្អាត Hello World សួស្តីពិភពលោក');
    expect($token)->toBe($expected);

});
