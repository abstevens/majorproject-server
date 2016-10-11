<?php

use \App\CourseClass;

$factory->define(CourseClass::class, function (Faker\Generator $faker) {
    $createdAt = daylightSavingTimeFix($faker->dateTimeThisMonth);
    return [
        'name' => $faker->name,
        'code' => $faker->unique()->randomNumber(4, true),
        'created_at' => $createdAt,
    ];
});
