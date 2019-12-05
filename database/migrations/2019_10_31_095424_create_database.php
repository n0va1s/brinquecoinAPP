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
            $table->enum('type', ['F', 'H', 'M', 'T']);
            $table->string('name', '100');
            $table->string('image');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('propouse_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('propouse', ['E', 'H', 'C', 'A', 'D', 'F', 'R', 'I']);
            $table->string('name');
            $table->string('icon', '50');
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
            $table->enum('active', ['Y','N'])->default('Y');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('board_type_id')->references('id')->on('board_types');
        });

        Schema::create('people', function (Blueprint $table) {
            $table->unsignedBigInteger('board_id');
            $table->string('name');
            $table->enum('gender', ['F', 'M']);
            $table->integer('age');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('board_id')->references('id')->on('boards');
        });

        Schema::create('activities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('board_id');
            $table->unsignedBigInteger('activity_type_id');
            $table->decimal('value', 5, 2)->nullable();
            $table->string('code')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('board_id')->references('id')->on('boards');
            $table->foreign('activity_type_id')->references('id')->on('activity_types')->onDelete('cascade');
        });

        Schema::create('marks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('activity_id');
            $table->enum('monday', ['Y','N'])->nullable();
            $table->enum('tuesday', ['Y','N'])->nullable();
            $table->enum('wednesday', ['Y','N'])->nullable();
            $table->enum('thursday', ['Y','N'])->nullable();
            $table->enum('friday', ['Y','N'])->nullable();
            $table->enum('saturday', ['Y','N'])->nullable();
            $table->enum('sunday', ['Y','N'])->nullable();
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
            $table->text('menssage');
            $table->enum('active', ['Y','N'])->default('Y');
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
