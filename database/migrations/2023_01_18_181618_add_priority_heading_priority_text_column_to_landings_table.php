<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPriorityHeadingPriorityTextColumnToLandingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('landings', function (Blueprint $table) {
            $table->text('priority_heading')->nullable();
            $table->text('priority_text')->nullable();
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
            $table->dropColumn('priority_heading');
            $table->dropColumn('priority_text');
        });
    }
}
