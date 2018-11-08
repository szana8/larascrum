<?php

use App\Issue;
use Illuminate\Database\Seeder;

class IssuesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Issue::class, 200)->create();
    }
}
