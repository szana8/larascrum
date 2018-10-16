<?php

use Faker\Generator as Faker;
use App\Issue;
use App\User;

$factory->define(App\Comment::class, function (Faker $faker) {
    return [
        'issue_id' => function () {
            return Issue::inRandomOrder()->first()->id;
        },
        'user_id' => function () {
            return User::inRandomOrder()->first()->id;
        },
        'text' => $faker->paragraph(2),
        'parent_id' => null
    ];
});
