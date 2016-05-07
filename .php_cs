<?php

$finder = Symfony\CS\Finder\DefaultFinder::create()
    //->exclude(__DIR__ . 'App/ResBundle/Resources/views/layouts/db')
    ->in(__DIR__ . '/application/Src')
    ->in(__DIR__ . '/application/database')
    ->in(__DIR__ . '/application/resources')
    ->in(__DIR__ . '/application/tests')
;

return Symfony\CS\Config\Config::create()
    ->finder($finder)
;
