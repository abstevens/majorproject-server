<?php

use \App\SchoolContact;

$factory->defineAs(SchoolContact::class, 'contact website', function (Faker\Generator $faker) {
    $createdAt = daylightSavingTimeFix($faker->dateTimeThisYear);

    return [
        'value' => $faker->domainName,
        'created_at' => $createdAt,
    ];
});

$factory->defineAs(SchoolContact::class, 'contact phone', function (Faker\Generator $faker) {
    $createdAt = daylightSavingTimeFix($faker->dateTimeThisYear);

    return [
        'value' => $faker->phoneNumber,
        'created_at' => $createdAt,
    ];
});

$factory->defineAs(SchoolContact::class, 'contact email', function (Faker\Generator $faker) {
    $createdAt = daylightSavingTimeFix($faker->dateTimeThisYear);

    return [
        'value' => $faker->email,
        'created_at' => $createdAt,
    ];
});
