<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOnlineUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('online_users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('channel_id')->nullable();
            $table->string('time')->nullable();
            $table->timestamps();

            // FK
            $table->foreign('user_id', 'online_user_fk')->on('users')->references('id')->onDelete('cascade');
            $table->foreign('channel_id', 'online_channel_fk')->on('channels')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('online_users');
    }
}
