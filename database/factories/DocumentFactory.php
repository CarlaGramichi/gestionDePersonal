<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Document;
use Faker\Generator as Faker;

$factory->define(Document::class, function (Faker $faker) {
    return [
        'name'          => $faker->sentence(4),
        'auto_generate' => $faker->randomElement(['1'])
    ];
});
