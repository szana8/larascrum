<?php

use App\User;
use App\Issue;
use Faker\Generator as Faker;

$factory->define(App\Reply::class, function (Faker $faker) {
    return [
        'issue_id' => function () {
            return Issue::inRandomOrder()->first()->id;
        },
        'user_id' => function () {
            return User::inRandomOrder()->first()->id;
        },
        'text'       => $faker->paragraph(2),
        'parent_id'  => null,
        'created_at' => $faker->dateTime(),
    ];
});
