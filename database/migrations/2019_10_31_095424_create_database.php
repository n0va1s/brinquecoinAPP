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
        Schema::create('tipo_quadros', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('tipo',['F','H','M','T']);
            $table->string('descricao','100');
            $table->string('imagem');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('tipo_propositos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('proposito',['E','H','C','A','D','F','R','I']);
            $table->string('descricao');
            $table->timestamps();
            $table->softDeletes();
        });
        
        Schema::create('tipo_atividades', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('tipo_proposito_id');
            $table->string('descricao');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('tipo_proposito_id')->references('id')->on('tipo_propositos');
        });

        Schema::create('quadros', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('tipo_quadro_id');
            $table->string('recompensa')->nullable();
            $table->timestamp('cadastradoEm')->useCurrent();
            $table->string('codigo');
            $table->enum('inativo',['S','N'])->default('N');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('tipo_quadro_id')->references('id')->on('tipo_quadros');
        });

        Schema::create('criancas', function (Blueprint $table) {
            $table->unsignedBigInteger('quadro_id');
            $table->string('crianca');
            $table->enum('genero',['F','M']);
            $table->integer('idade');
            $table->foreign('quadro_id')->references('id')->on('quadros');
        });

        Schema::create('atividades', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('quadro_id');
            $table->string('descricao');
            $table->decimal('valor',5,2)->nullable();
            $table->string('imagem')->nullable();
            $table->unsignedBigInteger('tipo_proposito_id');            
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('quadro_id')->references('id')->on('quadros');
            $table->foreign('tipo_proposito_id')->references('id')->on('tipo_propositos');
        });

        Schema::create('marcacoes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('atividade_id');
            $table->enum('segunda',['S','N'])->nullable();
            $table->enum('terca',['S','N'])->nullable();
            $table->enum('quarta',['S','N'])->nullable();
            $table->enum('quinta',['S','N'])->nullable();
            $table->enum('sexta',['S','N'])->nullable();
            $table->enum('sabado',['S','N'])->nullable();
            $table->enum('domingo',['S','N'])->nullable();
            $table->timestamps();
            $table->foreign('atividade_id')->references('id')->on('atividades');
        });

        Schema::create('capsulas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('nomeDe',200);
            $table->string('nomePara',200);
            $table->string('emailPara',100);
            $table->timestamp('avisadoEm');
            $table->text('mensagem');
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
        Schema::dropIfExists('capsulas');
        Schema::dropIfExists('marcacoes');
        Schema::dropIfExists('atividades');
        Schema::dropIfExists('criancas');
        Schema::dropIfExists('quadros');
        Schema::dropIfExists('users');
        Schema::dropIfExists('tipo_atividades');
        Schema::dropIfExists('tipo_quadros');        
        Schema::dropIfExists('tipo_propositos');     
    }
}
