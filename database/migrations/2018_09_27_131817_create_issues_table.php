<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->string('body')->nullable();
            $table->string('slug');
            $table->integer('type_id')->index();
            $table->integer('project_id')->index();
            $table->string('enviroment')->nullable();
            $table->string('components')->nullable();
            $table->integer('priority_id')->nullable();
            $table->integer('epic_link_id')->nullable();
            $table->integer('sprint_id')->nullable();
            $table->integer('fix_versions')->nullable();
            $table->dateTime('due_date')->nullable();
            $table->integer('original_estimate_time')->nullable();
            $table->integer('remaining_estimate_time')->nullable();
            $table->integer('reporter_id')->nullable();
            $table->integer('assignee_id')->nullable();
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
