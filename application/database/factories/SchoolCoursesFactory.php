<?php

use \App\SchoolCourse;

$factory->define(SchoolCourse::class, function (Faker\Generator $faker) {
    $createdAt = $faker->dateTimeThisYear;
    return [
        'created_at' => $createdAt,
        'updated_at' => $createdAt,
    ];
});
