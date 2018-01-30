<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyFreelancersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('freelancers', function (Blueprint $table) {
            $table->string('freelancer_title')->index();
            $table->integer('years_of_exp')->unsigned();
            $table->integer('experience_level')->unsigned();
             $table->integer('main_skill_id')->unsigned();
              $table->text('achievements');

            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('freelancers', function (Blueprint $table) {
            //
        });
    }
}
