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
        $this->call(PrioritiesTableSeeder::class);
        $this->call(ProjectsTableSeeder::class);
        $this->call(TypesTableSeeder::class);
        $this->call(IssuesTableSeeder::class);
        $this->call(RepliesTableSeeder::class);
        $this->call(SchemesTableSeeder::class);
    }
}
