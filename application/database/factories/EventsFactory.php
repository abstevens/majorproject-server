<?php

$factory->define(App\Event::class, function (Faker\Generator $faker, $attributes) {
    return [
        'title' => $faker->sentence,
        'description' => $faker->paragraph,
        'date_time' => $faker->dateTimeThisMonth,
        'location' => $faker->streetAddress,
        'price' => $faker->randomFloat(2, 0, 100),
        'limit_reservations' => $faker->randomNumber(2),
    ];
});
