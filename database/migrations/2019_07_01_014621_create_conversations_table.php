<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConversationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conversations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('sender_user_id')->index();
            $table->unsignedInteger('recipient_user_id')->index();
            $table->unique(['sender_user_id', 'recipient_user_id']);
            $table->timestamps();

            $table->foreign("sender_user_id")->references("id")->on("users")->onDelete('cascade');
            $table->foreign("recipient_user_id")->references("id")->on("users")->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conversations');
    }
}
