<?php

use Faker\Generator as Faker;

$factory->define(App\Issue::class, function (Faker $faker) {
    $title = $faker->sentence;

    return [
        'title'                   => $title,
        'body'                    => $faker->paragraph(3),
        'slug'                    => str_slug($title),
        'type_id'                 => $faker->numberBetween(1, 5),
        'project_id'              => $faker->numberBetween(1, 3),
        'enviroment'              => 'dev',
        'components'              => 'Dev',
        'priority_id'             => 1,
        'epic_link_id'            => null,
        'sprint_id'               => null,
        'fix_versions'            => null,
        'due_date'                => null,
        'original_estimate_time'  => null,
        'remaining_estimate_time' => null,
        'reporter_id'             => function () {
            return factory(App\User::class)->create()->id;
        },
        'assignee_id' => function () {
            return factory(App\User::class)->create()->id;
        },
    ];
});
