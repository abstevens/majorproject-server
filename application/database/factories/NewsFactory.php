<?php

use \App\News;

$factory->define(News::class, function (Faker\Generator $faker) {
    $createdAt = daylightSavingTimeFix($faker->dateTimeThisYear);
    return [
        'title' => $faker->name,
        'description' => $faker->paragraph,
        'created_at' => $createdAt,
    ];
});
