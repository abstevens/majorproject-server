<?php

use \App\School;

$factory->define(School::class, function (Faker\Generator $faker) {
    $createdAt = daylightSavingTimeFix($faker->dateTimeThisDecade);
    return [
        'name' => 'SAE ' . $faker->unique()->city,
        'created_at' => $createdAt,
    ];
});
