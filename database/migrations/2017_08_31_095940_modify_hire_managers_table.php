<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyHireManagersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hire_managers', function (Blueprint $table) {
            $table->string('company_name');
            $table->text('company_desc');
            $table->integer('company_contry_id')->unsigned();
            $table->string('company_city');
            $table->string('number_of_employees');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hire_managers', function (Blueprint $table) {
            //
        });
    }
}
