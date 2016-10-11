<?php

use \App\RolePermission;

$factory->define(RolePermission::class, function (Faker\Generator $faker) {
    $createdAt = daylightSavingTimeFix($faker->dateTimeThisYear);
    return [
        'created_at' => $createdAt,
    ];
});
