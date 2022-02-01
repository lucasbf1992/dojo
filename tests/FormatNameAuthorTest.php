<?php

use dojo\nameAuthors\FormatNameAuthorService;

test('Test Exception', function () {
    $formatNameService = new FormatNameAuthorService();

    expect(function() use ($formatNameService) {
        $formatNameService->format(0, 'lucas');
    })->toThrow(Exception::class);

    expect(function() use ($formatNameService) {
        $formatNameService->format(1, null);
    })->toThrow(Exception::class);
})->group('name-author');

test('Test Format One Name Author', function () {
    $name = 'ferreira';

    $formatNameService = new FormatNameAuthorService();

    $nameFormatted = $formatNameService->format($name);

    expect('FERREIRA')->toBe($nameFormatted);
})->group('name-author-format');
