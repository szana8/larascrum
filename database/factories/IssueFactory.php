<?php

use Faker\Generator as Faker;

$factory->define(App\Issue::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'body' => $faker->paragraph,
        'slug' => 'slug',
        'type_id' => 1,
        'project_id' => 1,
        'enviroment' => 'dev',
        'components' => 'Dev',
        'priority_id' => 1,
        'epic_link_id' => null,
        'sprint_id' => null,
        'fix_versions' => null,
        'due_date' => null,
        'original_estimate_time' => null,
        'remaining_estimate_time' => null,
        'reporter_id' => function() {
        	return factory(App\User::class)->create()->id;
        },
        'assignee_id' => function() {
        	return factory(App\User::class)->create()->id;
        },
    ];
});
