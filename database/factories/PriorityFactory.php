<?php

use Faker\Generator as Faker;

$factory->define(App\Priority::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => '',
        'icon' => 'storage/icons/priorities/blocker.png',
    ];
});
