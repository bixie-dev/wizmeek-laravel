<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chat_messages', function (Blueprint $table) {
            $table->id();
            $table->text('message');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('channel_id');
            $table->timestamps();

            $table->index('user_id', 'chat_message_user_idx');
            $table->index('channel_id', 'chat_message_channel_idx');

            $table->foreign('user_id', 'chat_message_user_fk')->on('users')->references('id');
            $table->foreign('channel_id', 'chat_message_channel_fk')->on('channels')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chat_messages');
    }
}
