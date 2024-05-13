<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLandingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('landings', function (Blueprint $table) {
            $table->id();

            $table->text('main_heading')->nullable();
            $table->text('main_text')->nullable();
            $table->text('soon_heading')->nullable();
            $table->text('cases_heading')->nullable();
            $table->text('cases_description')->nullable();
            $table->text('case1_heading')->nullable();
            $table->text('case2_heading')->nullable();
            $table->text('case1_text')->nullable();
            $table->text('case2_text')->nullable();
            $table->text('solution_heading')->nullable();
            $table->text('solution_text')->nullable();
            $table->text('process_heading')->nullable();
            $table->text('process_step1_heading')->nullable();
            $table->text('process_step2_heading')->nullable();
            $table->text('process_step3_heading')->nullable();
            $table->text('process_step1_text')->nullable();
            $table->text('process_step2_text')->nullable();
            $table->text('process_step3_text')->nullable();
            $table->text('footer_about')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('landings');
    }
}
