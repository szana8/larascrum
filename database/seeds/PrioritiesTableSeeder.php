<?php

use App\Priority;
use Illuminate\Database\Seeder;

class PrioritiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Priority::insert([
            [
                'name'        => 'Blocker',
                'description' => '',
                'icon'        => 'storage/icons/priorities/blocker.png',
            ],
            [
                'name'        => 'Critical',
                'description' => '',
                'icon'        => 'storage/icons/priorities/critical.png',
            ],
            [
                'name'        => 'Major',
                'description' => '',
                'icon'        => 'storage/icons/priorities/major.png',
            ],
            [
                'name'        => 'Minor',
                'description' => '',
                'icon'        => 'storage/icons/priorities/minor.png',
            ],
            [
                'name'        => 'Trivial',
                'description' => '',
                'icon'        => 'storage/icons/priorities/trivial.png',
            ],
        ]);
    }
}
