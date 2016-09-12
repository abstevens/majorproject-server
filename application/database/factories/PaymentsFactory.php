<?php

use \App\Payment;

$factory->define(Payment::class, function (Faker\Generator $faker) {
    $createdAt = $faker->dateTimeThisYear;
    return [
        'amount' => $faker->randomFloat(2, 50, 20000),
        'description' => $faker->sentence,
        'created_at' => $createdAt,
        'updated_at' => $createdAt,
    ];
});
