<?php

use \App\UserPayment;

$factory->define(UserPayment::class, function (Faker\Generator $faker) {
    $createdAt = daylightSavingTimeFix($faker->dateTimeThisYear);
    return [
        'amount' => $faker->randomFloat(2, 50, 20000),
        'description' => $faker->text,
        'created_at' => $createdAt,
    ];
});
