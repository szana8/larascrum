<?php

use Illuminate\Database\Seeder;

class SchemesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Scheme', 15)->create();
    }
}
