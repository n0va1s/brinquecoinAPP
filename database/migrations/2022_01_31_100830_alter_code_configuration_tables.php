<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCodeConfigurationTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(
            'activity_types', 
            function (Blueprint $table) {
                $table->string('code')->default('migration');
            }
        );

        Schema::table(
            'board_types', 
            function (Blueprint $table) {
                $table->string('code')->default('migration');
            }
        );

        Schema::table(
            'propouse_types', 
            function (Blueprint $table) {
                $table->string('code')->default('migration');
            }
        );

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(
            'activity_types',
            function (Blueprint $table) {
                $table->dropColumn('code');
            }
        );

        Schema::table(
            'board_types',
            function (Blueprint $table) {
                $table->dropColumn('code');
            }
        );

        Schema::table(
            'propouse_types',
            function (Blueprint $table) {
                $table->dropColumn('code');
            }
        );
    }
}
