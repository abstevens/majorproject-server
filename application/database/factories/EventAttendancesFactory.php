<?php

use \App\EventAttendance;

$factory->define(EventAttendance::class, function (Faker\Generator $faker) {
    return [
        'status' => $faker->boolean(),
    ];
});
