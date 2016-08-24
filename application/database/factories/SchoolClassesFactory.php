<?php

use \App\SchoolClass;

$factory->define(SchoolClass::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'code' => $faker->unique()->randomNumber(4, true),
    ];
});
