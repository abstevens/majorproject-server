<?php

$finder = Symfony\CS\Finder\DefaultFinder::create()
    //->exclude(__DIR__ . 'App/ResBundle/Resources/views/layouts/db')
    ->in(__DIR__ . '/application/app')
    ->in(__DIR__ . '/application/database')
    ->in(__DIR__ . '/application/resources')
    ->in(__DIR__ . '/application/tests')
;

$fixers = [
    "psr-4": { "App\\": "app/" }
];

return Symfony\CS\Config\Config::create()
    ->finder($finder)
    ->fixers($fixers)
;
