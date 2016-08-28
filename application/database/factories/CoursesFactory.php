<?php

use \App\Course;

$factory->define(Course::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'code' => $faker->unique()->randomNumber(4, true),
    ];
});
