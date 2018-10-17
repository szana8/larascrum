<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIssuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('issues', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('body')->nullable();
            $table->string('slug');
            $table->unsignedInteger('type_id')->index();
            $table->unsignedInteger('project_id')->index();
            $table->string('enviroment')->nullable();
            $table->string('components')->nullable();
            $table->unsignedInteger('priority_id')->nullable();
            $table->unsignedInteger('epic_link_id')->nullable();
            $table->unsignedInteger('sprint_id')->nullable();
            $table->unsignedInteger('status_id')->index();
            $table->unsignedInteger('fix_versions')->nullable();
            $table->dateTime('due_date')->nullable();
            $table->unsignedInteger('original_estimate_time')->nullable();
            $table->unsignedInteger('remaining_estimate_time')->nullable();
            $table->unsignedInteger('reporter_id')->nullable();
            $table->unsignedInteger('assignee_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('issues');
    }
}
