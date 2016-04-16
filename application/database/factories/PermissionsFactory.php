<?php

$factory->define(App\Permission::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'code' => $faker->randomNumber(),
    ];
});
