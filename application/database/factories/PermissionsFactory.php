<?php

use \App\Permission;

$factory->define(Permission::class, function (Faker\Generator $faker) {
    $createdAt = daylightSavingTimeFix($faker->dateTimeThisYear);
    return [
        'name' => $faker->name,
        'code' => $faker->randomNumber(6, true),
        'created_at' => $createdAt,
    ];
});
