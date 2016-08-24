<?php

use \App\SchoolUser;

$factory->define(SchoolUser::class, function (Faker\Generator $faker) {
    return [
        // 5-AMS-504500
        'student_code' => $faker->unique()->regexify('\d-\w{3}-\d{6}'),
    ];
});
