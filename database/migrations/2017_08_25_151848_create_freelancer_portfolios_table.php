<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFreelancerPortfoliosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('freelancer_portfolios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('freelancer_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('portfolio_image');
            $table->text('portfolio_desc');
            $table->text('portfolio_link');
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
        Schema::dropIfExists('freelancer_portfolios');
    }
}
