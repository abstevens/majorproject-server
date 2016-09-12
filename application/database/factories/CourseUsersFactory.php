<?php

use \App\CourseUser;

$factory->define(CourseUser::class, function (Faker\Generator $faker) {
    $createdAt = $faker->dateTimeThisMonth;
    return [
        'created_at' => $createdAt,
        'updated_at' => $createdAt,
    ];
});
