<?php

use \App\Role;

$factory->define(Role::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->unique()->word,
    ];
});
