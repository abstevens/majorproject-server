<?php

use \App\Event;

$factory->define(Event::class, function (Faker\Generator $faker) {
    $createdAt = $faker->dateTimeThisYear;
    return [
        'title' => $faker->sentence,
        'description' => $faker->paragraph,
        'date_time' => $faker->dateTimeThisMonth,
        'location' => $faker->streetAddress,
        'price' => $faker->randomFloat(2, 0, 100),
        'limit_reservations' => $faker->randomNumber(2),
        'created_at' => $createdAt,
        'updated_at' => $createdAt,
    ];
});
