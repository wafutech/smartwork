<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            /*$table->text('permissions');
            $table->integer('activated')->unsigned()->default(0);
            $table->integer('banned')->unsigned()->default(0);*/
    
        $table->string('activation_code')->default(Null);
        $table->datetime('activated_at');
        $table->datetime('last_login');
        $table->string('persist_code')->default(Null);
        $table->string('reset_password_code')->default(Null);
        $table->integer('protected')->unsigned()->default(0);
         });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
