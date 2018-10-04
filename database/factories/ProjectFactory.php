<?php

use Faker\Generator as Faker;
$factory->define(\App\Project::class, function (Faker $faker) {
    $name = $faker->unique()->word;
    $type = $faker->randomElement(['software', 'service_desk', 'business']);
    return [
        'name' => $name,
        'slug' => str_slug($name),
        'description' => $faker->text(100),
        'type' => $type,
        'icon' => function () use ($type) {
            return \Illuminate\Support\Facades\Storage::url('public/icons/project/' . $type . '.svg');
        },
        'owner_id' => function () {
            return factory('App\User')->create()->id;
        },
		'color_code' => $faker->randomElement(['blue', 'red', 'green', 'blue', 'purple', 'orange', 'teal']),
    ];
});
