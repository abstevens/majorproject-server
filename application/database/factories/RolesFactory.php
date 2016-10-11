<?php

use \App\Role;

$factory->define(Role::class, function (Faker\Generator $faker) {
    $createdAt = daylightSavingTimeFix($faker->dateTimeThisYear);
    return [
        'name' => $faker->unique()->word,
        'created_at' => $createdAt,
    ];
});
