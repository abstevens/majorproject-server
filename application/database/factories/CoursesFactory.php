<?php

use \App\Course;

$factory->define(Course::class, function (Faker\Generator $faker) {
    $createdAt = $faker->dateTimeThisYear;
    return [
        'name' => $faker->name,
        'code' => $faker->unique()->randomNumber(4, true),
        'created_at' => $createdAt,
        'updated_at' => $createdAt,
    ];
});
