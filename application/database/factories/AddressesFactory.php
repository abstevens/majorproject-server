<?php

use \App\Address;

$factory->define(Address::class, function (Faker\Generator $faker) {
    return [
        'street' => $faker->streetAddress,
        'city' => $faker->city,
        'country' => $faker->country,
        'postcode' => $faker->postcode,
    ];
});
