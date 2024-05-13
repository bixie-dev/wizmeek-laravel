<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPageColumnToLandingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('landings', function (Blueprint $table) {
            $table->text('about_heading')->nullable();
            $table->text('about_text')->nullable();
            $table->text('terms_and_conditions_heading')->nullable();
            $table->text('terms_and_conditions_text')->nullable();
            $table->text('privacy_policy_heading')->nullable();
            $table->text('privacy_policy_text')->nullable();
            $table->text('submit_heading')->nullable();
            $table->text('submit_text')->nullable();
            $table->text('submit_text_red')->nullable();
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
            $table->dropColumn('about_heading');
            $table->dropColumn('about_text');
            $table->dropColumn('terms_and_conditions_heading');
            $table->dropColumn('terms_and_conditions_text');
            $table->dropColumn('privacy_policy_heading');
            $table->dropColumn('privacy_policy_text');
            $table->dropColumn('submit_heading');
            $table->dropColumn('submit_text');
            $table->dropColumn('submit_text_red');
        });
    }
}
