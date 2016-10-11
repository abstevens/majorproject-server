<?php

use \App\UserContact;

$factory->defineAs(UserContact::class, 'contact phone', function (Faker\Generator $faker) {
    $createdAt = daylightSavingTimeFix($faker->dateTimeThisYear);

    return [
        'value' => $faker->phoneNumber,
        'created_at' => $createdAt,
    ];
});

$factory->defineAs(UserContact::class, 'contact email', function (Faker\Generator $faker) {
    $createdAt = daylightSavingTimeFix($faker->dateTimeThisYear);

    return [
        'value' => $faker->email,
        'created_at' => $createdAt,
    ];
});
