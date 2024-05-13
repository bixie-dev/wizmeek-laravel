<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepeatRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('repeat_requests', function (Blueprint $table) {
            $table->id();
            $table->string('artist_name', 100)->nullable();
            $table->string('song_name', 100)->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('channel_id');
            $table->timestamps();

            // FK
            $table->foreign('user_id')->on('users')->references('id');
            $table->foreign('channel_id')->on('channels')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('repeat_requests');
    }
}
