<?php

use \App\RoleUser;

$factory->define(RoleUser::class, function (Faker\Generator $faker) {
    $createdAt = $faker->dateTimeThisYear;
    return [
        'created_at' => $createdAt,
        'updated_at' => $createdAt,
    ];
});
