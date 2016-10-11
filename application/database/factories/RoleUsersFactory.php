<?php

use \App\RoleUser;

$factory->define(RoleUser::class, function (Faker\Generator $faker) {
    $createdAt = daylightSavingTimeFix($faker->dateTimeThisYear);
    return [
        'created_at' => $createdAt,
    ];
});
