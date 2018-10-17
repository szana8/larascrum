<?php

use Faker\Generator as Faker;
use App\User;
use App\Priority;
use App\Project;
use App\IssueType;

$factory->define(App\Issue::class, function (Faker $faker) {
    $title = $faker->sentence;

    return [
        'title'                   => $title,
        'body'                    => $faker->paragraph(10),
        'slug'                    => str_slug($title),
        'type_id'                 => function () {
            return IssueType::inRandomOrder()->first()->id;
        },
        'project_id'              => function () {
            return Project::inRandomOrder()->first()->id;
        },
        'enviroment'              => 'dev',
        'components'              => 'Dev',
        'priority_id'             => function() {
            return Priority::inRandomOrder()->first()->id;
        },
        'epic_link_id'            => null,
        'sprint_id'               => null,
        'fix_versions'            => null,
        'status_id'               => 1,
        'due_date'                => $faker->dateTime(),
        'original_estimate_time'  => null,
        'remaining_estimate_time' => null,
        'reporter_id'             => function () {
            return User::inRandomOrder()->first()->id;
        },
        'assignee_id' => function () {
            return User::inRandomOrder()->first()->id;
        },
    ];
});
