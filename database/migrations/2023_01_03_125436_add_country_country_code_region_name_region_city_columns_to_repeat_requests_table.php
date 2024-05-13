<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCountryCountryCodeRegionNameRegionCityColumnsToRepeatRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('repeat_requests', function (Blueprint $table) {
            $table->string('country')->nullable();
            $table->string('country_code')->nullable();
            $table->string('region_name')->nullable();
            $table->string('region')->nullable();
            $table->string('city')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('repeat_requests', function (Blueprint $table) {
            $table->dropColumn('country');
            $table->dropColumn('country_code');
            $table->dropColumn('region_name');
            $table->dropColumn('region');
            $table->dropColumn('city');
        });
    }
}
