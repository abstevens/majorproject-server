<?php

use \App\CourseUser;

$factory->define(CourseUser::class, function (Faker\Generator $faker) {
    $createdAt = daylightSavingTimeFix($faker->dateTimeThisMonth);
    return [
        'created_at' => $createdAt,
    ];
});
