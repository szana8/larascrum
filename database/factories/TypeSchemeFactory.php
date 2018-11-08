<?php

use Faker\Generator as Faker;
use App\Type;
use App\Scheme;

$factory->define(IssueTypeSchemaPivot::class, function (Faker $faker) {
    return [
        'issue_type_id' => function () {
            return Type::inRandomOrder()->first()->id;
        },
        'issue_type_schema_id' => function () {
            return Scheme::inRandomOrder()->first()->id;
        }
    ];
});
