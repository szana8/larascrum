<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(PrioritiesSeeder::class);
        $this->call(ProjectsTableSeeder::class);
        $this->call(IssueTypeSeeder::class);
        $this->call(IssueSeeder::class);
    }
}
