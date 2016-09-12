<?php

use \App\RolePermission;

$factory->define(RolePermission::class, function (Faker\Generator $faker) {
    $createdAt = $faker->dateTimeThisYear;
    return [
        'created_at' => $createdAt,
        'updated_at' => $createdAt,
    ];
});
