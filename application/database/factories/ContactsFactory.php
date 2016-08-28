<?php

use \App\Contact;

$factory->defineAs(Contact::class, 'contact phone', function (Faker\Generator $faker) {
    return [
        'value' => $faker->phoneNumber,
    ];
});

$factory->defineAs(Contact::class, 'contact email', function (Faker\Generator $faker) {
    return [
        'value' => $faker->email,
    ];
});
