<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('icon')->nullable()->default('default_icon.png');
            $table->string('id_picture')->nullable();
            $table->text('description')->nullable();
            $table->boolean('admin')->default(false);
            $table->string('address')->nullable();
            $table->string('zip')->nullable();
            $table->string('pref')->nullable();
            $table->string('town')->nullable();
            $table->string('building')->nullable();
            $table->double('latitude')->nullable();
            $table->double('longitude')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
