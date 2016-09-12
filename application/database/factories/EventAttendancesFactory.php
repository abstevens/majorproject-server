<?php

use \App\EventAttendance;

$factory->define(EventAttendance::class, function (Faker\Generator $faker) {
    $createdAt = $faker->dateTimeThisMonth;
    return [
        'status' => $faker->boolean(),
        'created_at' => $createdAt,
        'updated_at' => $createdAt,
    ];
});
