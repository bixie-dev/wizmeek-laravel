<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubmitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submits', function (Blueprint $table) {
            $table->id();
            $table->string('artist_name')->nullable(false);
            $table->string('song_title')->nullable(false);
            $table->string('genre')->nullable(false);
            $table->string('release_date')->nullable(false);
            $table->string('youtube_link')->nullable();
            $table->string('video_path')->nullable();
            $table->string('policy_agreement')->nullable(false);
            $table->integer('flag_new')->nullable(false);
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            // IDX
            $table->index('user_id', 'submit_user_idx');

            // FK
            $table->foreign('user_id', 'submit_user_fk')->on('users')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('submits');
    }
}
