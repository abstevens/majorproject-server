<?php

use \App\CourseAward;

$factory->define(CourseAward::class, function (Faker\Generator $faker) {
    $createdAt = $faker->dateTimeThisMonth;
    return [
        'name' => $faker->name,
        'created_at' => $createdAt,
        'updated_at' => $createdAt,
    ];
});
