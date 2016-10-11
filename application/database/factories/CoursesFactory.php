<?php

use \App\Course;

$factory->define(Course::class, function (Faker\Generator $faker) {
    $createdAt = daylightSavingTimeFix($faker->dateTimeThisYear);
    return [
        'name' => $faker->name,
        'code' => $faker->unique()->randomNumber(4, true),
        'created_at' => $createdAt,
    ];
});
