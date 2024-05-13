<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImgColumnToLandingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('landings', function (Blueprint $table) {
            $table->string('main_img')->nullable();
            $table->string('case1_img')->nullable();
            $table->string('case2_img')->nullable();
            $table->string('solution_img')->nullable();
            $table->string('process_step1_img')->nullable();
            $table->string('process_step2_img')->nullable();
            $table->string('process_step3_img')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('landings', function (Blueprint $table) {
            $table->dropColumn('main_img');
            $table->dropColumn('case1_img');
            $table->dropColumn('case2_img');
            $table->dropColumn('solution_img');
            $table->dropColumn('process_step1_img');
            $table->dropColumn('process_step2_img');
            $table->dropColumn('process_step3_img');
        });
    }
}
