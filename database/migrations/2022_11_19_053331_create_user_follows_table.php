<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserFollowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_follows', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('follow_id');

            $table->timestamps();

            // IDX
            $table->index('user_id', 'user_follow_follow_idx');
            $table->index('follow_id', 'user_follow_user_idx');

            // FK
            $table->foreign('user_id', 'user_follow_follow_fk')->on('users')->references('id');
            $table->foreign('follow_id', 'user_follow_user_fk')->on('users')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_follows');
    }
}
