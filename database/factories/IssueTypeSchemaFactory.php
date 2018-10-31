<?php

use Faker\Generator as Faker;

$factory->define(App\IssueTypeSchema::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->word,
        'description' => $faker->paragraph(10)
    ];
});
