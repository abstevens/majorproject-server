<?php

use \App\CoursePrice;

$factory->define(CoursePrice::class, function (Faker\Generator $faker) {
    $createdAt = $faker->dateTimeThisMonth;
    return [
        'price' => $faker->randomFloat(2, 100, 10000),
        'created_at' => $createdAt,
        'updated_at' => $createdAt,
    ];
});
