<?php

use \App\School;

$factory->define(School::class, function (Faker\Generator $faker) {
    return [
        'name' => 'SAE ' . $faker->unique()->city,
    ];
});
