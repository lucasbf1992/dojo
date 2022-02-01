<?php

use dojo\nameAuthors\FormatNameAuthorService;

test('Test Exception', function () {
    $formatNameService = new FormatNameAuthorService();

    expect(function() use ($formatNameService) {
        $formatNameService->format(null);
    })->toThrow(Exception::class);
})->group('name-author');

test('Test Format Name Author', function ($name, $expect) {
    $formatNameService = new FormatNameAuthorService();

    $nameFormatted = $formatNameService->format($name);

    expect($nameFormatted)->toBe($expect);
})->with([
    ['ferreira', 'FERREIRA'],
    ['lucas ferreira junior', 'FERREIRA JUNIOR, Lucas'],
    ['lucas BERNARDINELLI ferreira sobrinho', 'FERREIRA SOBRINHO, Lucas Bernardinelli'],
    ['lucas BERNARDINELLI ferreira', 'FERREIRA, Lucas Bernardinelli']
])->group('name-author');
