<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cooks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('image')->nullable();
            $table->string('description');
            $table->nsignedInteger('user_id')->index();
            $table->nsignedInteger('category_id');
            $table->integer('price');
            $table->integer('num');
            $table->text('etc')->nullable();
            $table->timestamp('start_time')->nullable();
            $table->timestamp('end_time')->nullable();
            $table->timestamps();

            $table->foreign("user_id")->references("id")->on("users")->onDelete('cascade');
            $table->foreign("category_id")->references("id")->on("cook_categories")->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cooks');
    }
}
