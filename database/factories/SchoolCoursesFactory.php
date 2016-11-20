<?php

use \App\SchoolCourse;

$factory->define(SchoolCourse::class, function (Faker\Generator $faker) {
    $createdAt = daylightSavingTimeFix($faker->dateTimeThisYear);
    return [
        'created_at' => $createdAt,
    ];
});
