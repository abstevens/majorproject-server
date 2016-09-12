<?php

use \App\UserContact;

$createdAt = $faker->dateTimeThisYear;

$factory->defineAs(UserContact::class, 'contact phone', function (Faker\Generator $faker) use ($createdAt) {
    return [
        'value' => $faker->phoneNumber,
        'created_at' => $createdAt,
        'updated_at' => $createdAt,
    ];
});

$factory->defineAs(UserContact::class, 'contact email', function (Faker\Generator $faker) use ($createdAt) {
    return [
        'value' => $faker->email,
        'created_at' => $createdAt,
        'updated_at' => $createdAt,
    ];
});
