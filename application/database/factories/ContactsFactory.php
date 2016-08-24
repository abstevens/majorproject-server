<?php

use \App\Contact;

$factory->define(Contact::class, function (Faker\Generator $faker) {
    return [
        'value' => $faker->phoneNumber,
    ];
});
