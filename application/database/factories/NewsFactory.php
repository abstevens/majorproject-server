<?php

$factory->define(App\News::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->name,
        'description' => $faker->paragraph,
    ];
});
