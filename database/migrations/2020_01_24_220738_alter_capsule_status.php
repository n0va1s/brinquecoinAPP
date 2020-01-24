<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCapsuleStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(
            'capsules',
            function (Blueprint $table) {
                $table->string('status', 1)->default('N'); // new
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
            'capsules',
            function (Blueprint $table) {
                $table->dropColumn('status');
            }
        );
    }
}
