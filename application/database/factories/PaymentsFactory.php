<?php

use \App\Payment;

$factory->define(Payment::class, function (Faker\Generator $faker) {
    return [
        'amount' => $faker->randomFloat(2, 50, 20000),
        'description' => $faker->sentence,
    ];
});
