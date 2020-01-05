<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatabase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('board_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('type', 1);
            $table->string('name', 100);
            $table->string('image');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('propouse_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('propouse', 1);
            $table->string('name');
            $table->string('icon', 50);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('activity_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('propouse_type_id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('name');
            $table->string('image')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('propouse_type_id')->references('id')->on('propouse_types');
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::create('boards', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('board_type_id');
            $table->string('goal')->nullable();
            $table->string('code')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('board_type_id')->references('id')->on('board_types');
        });

        Schema::create('people', function (Blueprint $table) {
            $table->unsignedBigInteger('board_id');
            $table->string('name');
            $table->char('gender', 1);
            $table->integer('age');
            $table->timestamps();
            $table->foreign('board_id')->references('id')->on('boards');
        });

        Schema::create('activities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('board_id');
            $table->unsignedBigInteger('activity_type_id');
            $table->decimal('value', 5, 2)->nullable();
            $table->string('code')->nullable();
            $table->timestamps();
            $table->foreign('board_id')->references('id')->on('boards');
            $table->foreign('activity_type_id')->references('id')->on('activity_types')->onDelete('cascade');
        });

        Schema::create('marks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('activity_id');
            $table->integer('monday')->nullable();
            $table->integer('tuesday')->nullable();
            $table->integer('wednesday')->nullable();
            $table->integer('thursday')->nullable();
            $table->integer('friday')->nullable();
            $table->integer('saturday')->nullable();
            $table->integer('sunday')->nullable();
            $table->timestamps();
            $table->foreign('activity_id')->references('id')->on('activities');
        });

        Schema::create('capsules', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('code', 255);
            $table->string('from', 200);
            $table->string('to', 200);
            $table->string('email', 100);
            $table->timestamp('remember_at');
            $table->text('message');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('capsules');
        Schema::dropIfExists('marks');
        Schema::dropIfExists('activities');
        Schema::dropIfExists('children');
        Schema::dropIfExists('boards');
        Schema::dropIfExists('users');
        Schema::dropIfExists('activity_types');
        Schema::dropIfExists('board_types');
        Schema::dropIfExists('propouse_types');
    }
}
