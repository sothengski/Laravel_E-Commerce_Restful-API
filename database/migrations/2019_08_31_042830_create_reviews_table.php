<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->bigIncrements('id', true);
            // $table->integer('product_id')->unsigned()->index();
            $table->unsignedBigInteger('product_id')->index(); //Laravel 5.8 by using unsignBigInteger cuz product_id is BigIncrements
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->string('customer');
            $table->text('review');
            $table->integer('star');
            $table->timestamps();
        });
        // Schema::table('reviews', function($table) {
        //     $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}
