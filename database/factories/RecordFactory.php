<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Record;
use Faker\Generator as Faker;

$factory->define(Record::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'phone' => rand(1111111111,mt_getrandmax()),
        'iin' => $faker->ean13,
        'start_date' => $faker->dateTime, // password
        'finish_date' => $faker->dateTime,
        'gos_number' => $faker->ean8,
    ];
});
