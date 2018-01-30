<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectmilestonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projectmilestones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('proposal_id')->unsigned();
            $table->text('milestone_desc');
            $table->date('start_date');
            $table->date('end_date');
            $table->decimal('cost');
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
        Schema::dropIfExists('projectmilestones');
    }
}
