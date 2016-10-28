<?php

use \App\Role;

$factory->define(Role::class, function (Faker\Generator $faker) {
    $createdAt = daylightSavingTimeFix($faker->dateTimeThisYear);
    return [
        'name' => $faker->unique()->jobTitle,
        'created_at' => $createdAt,
    ];
});
