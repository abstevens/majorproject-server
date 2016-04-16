<?php

$factory->define(App\EventAttendance::class, function (Faker\Generator $faker, $user, $event) {
    return [
        'status' => $faker->boolean(),
    ];
});
