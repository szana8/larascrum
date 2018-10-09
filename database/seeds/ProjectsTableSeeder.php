<?php

use App\Project;
use App\User;
use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Project::insert([
    		[
    			'name' => 'Marketing',
    			'slug' => 'MKRT',
    			'description' => 'Marketing project',
    			'type' => 'business',
    			'icon' => 'storage/icons/project/business.svg',
    			'owner_id' => 1,
    		],
    		[
    			'name' => 'Sales Marketing',
    			'slug' => 'SLSMKT',
    			'description' => 'Sales Marketing project',
    			'type' => 'software',
    			'icon' => 'storage/icons/project/software.svg',
    			'owner_id' => 1,
    		],
    		[
    			'name' => 'Marketing Aerodefense',
    			'slug' => 'MRDFN',
    			'description' => 'Marketing Aerodefense project',
    			'type' => 'service_desk',
    			'icon' => 'storage/icons/project/service_desk.svg',
    			'owner_id' => 1,
    		]
    	]);
    }
}
