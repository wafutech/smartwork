<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jobs', function (Blueprint $table) {
          $table->integer('freelancers_needed')->unsigned();
          $table->integer('time_commitment_id')->unsigned();
          $table->integer('freelancer_experience_id')->unsigned();
          $table->integer('job_type_id')->unsigned();
          $table->integer('project_cycle_id')->unsigned();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jobs', function (Blueprint $table) {
            //
        });
    }
}
