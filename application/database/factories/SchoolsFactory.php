<?php

use \App\School;

$factory->define(School::class, function (Faker\Generator $faker) {
    $createdAt = $faker->dateTimeThisCentury;
    return [
        'name' => 'SAE ' . $faker->unique()->city,
        'created_at' => $createdAt,
        'updated_at' => $createdAt,
    ];
});
