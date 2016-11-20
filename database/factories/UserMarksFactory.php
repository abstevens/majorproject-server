<?php

use \App\UserMark;

$factory->define(UserMark::class, function (Faker\Generator $faker) {
    $createdAt = daylightSavingTimeFix($faker->dateTimeThisDecade);
    return [
        'assignment' => $faker->word,
        'percentage' => mt_rand(0, 100),
        'created_at' => $createdAt,
    ];
});
