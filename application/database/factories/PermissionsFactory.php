<?php

use \App\Permission;

$factory->define(Permission::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'code' => $faker->randomNumber(6, true),
    ];
});
