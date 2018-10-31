<?php

use Faker\Generator as Faker;
use App\IssueType;
use App\IssueTypeSchema;
use App\IssueTypeSchemaPivot;

$factory->define(IssueTypeSchemaPivot::class, function (Faker $faker) {
    return [
        'issue_type_id' => function () {
            return IssueType::inRandomOrder()->first()->id;
        },
        'issue_type_schema_id' => function () {
            return IssueTypeSchema::inRandomOrder()->first()->id;
        }
    ];
});
