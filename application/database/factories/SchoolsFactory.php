<?php

$factory->define(App\School::class, function (Faker\Generator $faker) {
    return [
        'name' => 'SAE ' . $faker->unique()->city,
    ];
});
