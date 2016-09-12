<?php

use \App\User;

$factory->define(User::class, function (Faker\Generator $faker) {
    $createdAt = $faker->dateTimeThisDecade;
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'username' => $faker->userName,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
        'created_at' => $createdAt,
        'updated_at' => $createdAt,
    ];
});
