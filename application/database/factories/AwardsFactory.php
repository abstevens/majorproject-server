<?php

use \App\Award;

$factory->define(Award::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
    ];
});
