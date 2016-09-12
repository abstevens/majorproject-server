<?php

use \App\CourseClassAttendance;

$factory->define(CourseClassAttendance::class, function (Faker\Generator $faker) {
    $createdAt = $faker->dateTimeThisYear;
    return [
        'status' => $faker->boolean(),
        'created_at' => $createdAt,
        'updated_at' => $createdAt,
    ];
});
