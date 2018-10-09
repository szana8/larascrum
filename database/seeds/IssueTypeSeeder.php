<?php

use Illuminate\Database\Seeder;
use App\IssueType;

class IssueTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        IssueType::insert([
            [
                'name' => 'Bug',
                'slug' => 'bug',
                'icon' => 'storage/icons/issuetypes/bug.png',
                'color_code' => 'red',
                'description' => ''
            ],
            [
                'name' => 'Epic',
                'slug' => 'epic',
                'icon' => 'storage/icons/issuetypes/epic.png',
                'color_code' => 'purple',
                'description' => ''
            ],
            [
                'name' => 'Improvement',
                'slug' => 'improvement',
                'icon' => 'storage/icons/issuetypes/improvement.png',
                'color_code' => 'green',
                'description' => ''
            ],
            [
                'name' => 'Story',
                'slug' => 'story',
                'icon' => 'storage/icons/issuetypes/story.png',
                'color_code' => 'orange',
                'description' => ''
            ],
            [
                'name' => 'Task',
                'slug' => 'task',
                'icon' => 'storage/icons/issuetypes/task.png',
                'color_code' => 'blue',
                'description' => ''
            ],
        ]);
    }
}
