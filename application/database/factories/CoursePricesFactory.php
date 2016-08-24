<?php

use \App\CoursePrice;

$factory->define(CoursePrice::class, function (Faker\Generator $faker) {
    return [
        'price' => $faker->randomFloat(2, 100, 10000),
    ];
});
