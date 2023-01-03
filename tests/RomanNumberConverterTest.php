<?php

use app\RomanNumberConverter\RomanNumberConverter;

test('Test Converter Roman Number', function ($roman, $expect) {
    $result = (new RomanNumberConverter($roman))->getInteger();

    $this->assertEquals($expect, $result);
})->with([
    ['XX', '20'],
    ['IV', '4'],
    ['MCDXXXII', '1432'],
])->group('roman-converter');
