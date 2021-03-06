<?php

use \App\Event;

$factory->define(Event::class, function (Faker\Generator $faker) {
    $createdAt = daylightSavingTimeFix($faker->dateTimeThisYear);
    return [
        'title' => $faker->sentence,
        'description' => $faker->text,
        'date_time' => $faker->dateTimeThisMonth,
        'location' => $faker->streetAddress,
        'price' => $faker->randomFloat(2, 0, 100),
        'limit_reservations' => $faker->randomNumber(2),
        'created_at' => $createdAt,
    ];
});
