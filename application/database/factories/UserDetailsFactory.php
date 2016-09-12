<?php

use \App\UserDetail;

$factory->define(UserDetail::class, function (Faker\Generator $faker) {
    $createdAt = $faker->dateTimeThisYear;
    return [
        'type' => $faker->word,
        'value' => $faker->sentence,
        'created_at' => $createdAt,
        'updated_at' => $createdAt,
    ];
});
