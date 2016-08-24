<?php

use \App\Detail;

$factory->define(Detail::class, function (Faker\Generator $faker) {
    return [
        'type' => $faker->word,
        'value' => $faker->sentence,
    ];
});
