<?php

use \App\UserAddress;

$factory->define(UserAddress::class, function (Faker\Generator $faker) {
    $createdAt = daylightSavingTimeFix($faker->dateTimeThisYear);
    return [
        'street' => $faker->streetAddress,
        'city' => $faker->city,
        'country' => $faker->country,
        'postcode' => $faker->postcode,
        'created_at' => $createdAt,
    ];
});
