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
            $table->increments('id');
            $table->integer('rank');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('cook_id');
            $table->text('comment')->nullable();
            $table->unique(['user_id', 'cook_id']);
            $table->timestamps();

            $table->foreign("user_id")->references("id")->on("users")->onDelete('cascade');
            $table->foreign("cook_id")->references("id")->on("cooks")->onDelete('cascade');
        });
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
