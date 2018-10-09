<?php

use Illuminate\Database\Seeder;
use App\Issue;

class IssueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Issue::class, 10)->create();
    }
}
