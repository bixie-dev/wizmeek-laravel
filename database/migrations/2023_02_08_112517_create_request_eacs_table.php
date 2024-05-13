<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestEacsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_eacs', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('name');
            $table->string('new');
            $table->unsignedBigInteger('eac_id')->nullable();
            $table->timestamps();

            $table->foreign('eac_id', 'request_eac_fk')->on('eacs')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('request_eacs');
    }
}
