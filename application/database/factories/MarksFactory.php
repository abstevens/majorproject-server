<?php

use \App\Mark;

$factory->define(Mark::class, function (Faker\Generator $faker) {
    return [
        'assignment' => $faker->word,
        'percentage' => mt_rand(0, 100),
    ];
});
