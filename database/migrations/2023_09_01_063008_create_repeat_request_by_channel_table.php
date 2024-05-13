<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepeatRequestByChannelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('repeat_request_by_channel', function (Blueprint $table) {
            $table->id();
            $table->string('performer', 255);
            $table->string('song_name', 255);
            $table->unsignedBigInteger('channel_id');
            $table->timestamps();

            $table->foreign('channel_id', 'repeat_request_channel_fk')->on('channels')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('repeat_request_by_channel');
    }
}
