<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChannelUserLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('channel_user_likes', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('channel_id');
            $table->unsignedBigInteger('user_id');

            $table->timestamps();

            // IDX
            $table->index('channel_id', 'channel_user_channel_idx');
            $table->index('user_id', 'channel_user_user_idx');

            // FK
            $table->foreign('channel_id', 'channel_user_channel_fk')->on('channels')->references('id');
            $table->foreign('user_id', 'channel_user_user_fk')->on('users')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('channel_user_likes');
    }
}
