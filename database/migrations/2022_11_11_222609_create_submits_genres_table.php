<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubmitsGenresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submits_genres', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('submit_id');
            $table->unsignedBigInteger('genre_id');

            $table->timestamps();

            // IDX
            $table->index('submit_id', 'submit_genre_submit_idx');
            $table->index('genre_id', 'submit_genre_genre_idx');

            // FK
            $table->foreign('submit_id', 'submmit_genre_submit_fk')->on('submits')->references('id');
            $table->foreign('genre_id', 'submit_genre_genre_fk')->on('genres')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('submits_genres');
    }
}
