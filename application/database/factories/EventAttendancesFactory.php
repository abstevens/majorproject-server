<?php

$factory->define(App\EventAttendance::class, function (Faker\Generator $faker, $attributes) {
    return [
        'status' => $faker->boolean(),
    ];
});
