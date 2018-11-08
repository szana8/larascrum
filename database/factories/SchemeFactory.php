<?php

use Faker\Generator as Faker;

$factory->define(App\Scheme::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->sentence,
        'description' => $faker->realText()
    ];
});
