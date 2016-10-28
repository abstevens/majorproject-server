<?php

use \App\User;

$factory->define(User::class, function (Faker\Generator $faker) {
    $createdAt = daylightSavingTimeFix($faker->dateTimeThisDecade);
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->unique()->email,
        'password' => bcrypt(str_random(10)),
        'date_of_birth' => $faker->date(),
        'remember_token' => str_random(10),
        'created_at' => $createdAt,
    ];
});
