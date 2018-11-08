<?php

use Faker\Generator as Faker;

$factory->define(App\Type::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'slug' => $faker->word,
        'icon' => 'storage/icons/issuetypes/bug.png',
        'color_code' => 'red',
        'description' => '',
    ];
});
