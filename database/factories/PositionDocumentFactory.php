<?php

/** @var Factory $factory */

use App\PositionDocument;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(PositionDocument::class, function (Faker $faker) {
    return [
        'position_id' => $faker->numberBetween(1, 5),
        'document_id' => $faker->numberBetween(1, 60),
    ];
});
