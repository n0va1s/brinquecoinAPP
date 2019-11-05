<?php

use Illuminate\Database\Seeder;
use App\User;

class insert_database extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Dados do primeiro usuario
        $dados = [
            'name'=>'João Paulo',
            'email'=> 'jp.trabalho@gmail.com',
            'password'=>bcrypt('linux1')
        ];
        //Verifica se esse o usuario ja existe
        if(User::where('email','=',$dados['email'])->count()){
            DB::table('users')->update($dados);
        } else {
            DB::table('users')->insert($dados);
        }
        //Registros das tabelas basicas
        DB::table('tipo_quadros')->insert(['tipo' => 'F','descricao' => 'Férias', 'imagem'=>'img/tipo_quadros/ferias.png']);
        DB::table('tipo_quadros')->insert(['tipo' => 'H','descricao' => 'Hábito', 'imagem'=>'img/tipo_quadros/habito.png']);
        DB::table('tipo_quadros')->insert(['tipo' => 'M','descricao' => 'Mesada', 'imagem'=>'img/tipo_quadros/mesada.png']);
        DB::table('tipo_quadros')->insert(['tipo' => 'T','descricao' => 'Tarefa', 'imagem'=>'img/tipo_quadros/tarefa.png']);

        DB::table('tipo_propositos')->insert(['proposito' => 'E','descricao' => 'Escola']);
        DB::table('tipo_propositos')->insert(['proposito' => 'H','descricao' => 'Higiene']);
        DB::table('tipo_propositos')->insert(['proposito' => 'C','descricao' => 'Comportamento']);
        DB::table('tipo_propositos')->insert(['proposito' => 'A','descricao' => 'Autonomia']);
        DB::table('tipo_propositos')->insert(['proposito' => 'D','descricao' => 'Casa']);
        DB::table('tipo_propositos')->insert(['proposito' => 'F','descricao' => 'Exercício']);
        DB::table('tipo_propositos')->insert(['proposito' => 'R','descricao' => 'Refeição']);
        DB::table('tipo_propositos')->insert(['proposito' => 'I','descricao' => 'Espiritualidade']);
    }
}
