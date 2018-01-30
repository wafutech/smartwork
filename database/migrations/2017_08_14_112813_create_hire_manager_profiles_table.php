<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHireManagerProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hire_manager_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('hire_manager_id')->unsigned()->unique();
            $table->integer('jobs_posted')->unsigned()->default(0);
            $table->integer('hires')->unsigned()->default(0);
            $table->decimal('amount_spent')->default(00.00);
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
        Schema::dropIfExists('hire_manager_profiles');
    }
}
