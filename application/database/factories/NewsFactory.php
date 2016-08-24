<?php

use \App\News;

$factory->define(News::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->name,
        'description' => $faker->paragraph,
    ];
});
