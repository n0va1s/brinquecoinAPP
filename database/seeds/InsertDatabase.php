<?php

use Illuminate\Database\Seeder;
use App\User;

class InsertDatabase extends Seeder
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
            'name' => 'João Paulo',
            'email' => 'jp.trabalho@gmail.com',
            'password' => bcrypt('linux1')
        ];
        //Verifica se esse o usuario ja existe
        if (User::where('email', '=', $dados['email'])->count()) {
            DB::table('users')->update($dados);
        } else {
            DB::table('users')->insert($dados);
        }
        //Registros das tabelas basicas
        DB::table('tipo_quadros')->insert(['tipo' => 'F', 'descricao' => 'Férias', 'imagem' => 'img/tiposquadros/ferias.jpg']);
        DB::table('tipo_quadros')->insert(['tipo' => 'H', 'descricao' => 'Hábito', 'imagem' => 'img/tiposquadros/habito.png']);
        DB::table('tipo_quadros')->insert(['tipo' => 'M', 'descricao' => 'Mesada', 'imagem' => 'img/tiposquadros/mesada.jpg']);
        DB::table('tipo_quadros')->insert(['tipo' => 'T', 'descricao' => 'Tarefa', 'imagem' => 'img/tiposquadros/tarefas.jpg']);

        DB::table('tipo_propositos')->insert(['proposito' => 'E', 'descricao' => 'Escola']);
        DB::table('tipo_propositos')->insert(['proposito' => 'H', 'descricao' => 'Higiene']);
        DB::table('tipo_propositos')->insert(['proposito' => 'C', 'descricao' => 'Comportamento']);
        DB::table('tipo_propositos')->insert(['proposito' => 'A', 'descricao' => 'Autonomia']);
        DB::table('tipo_propositos')->insert(['proposito' => 'D', 'descricao' => 'Casa']);
        DB::table('tipo_propositos')->insert(['proposito' => 'F', 'descricao' => 'Exercício']);
        DB::table('tipo_propositos')->insert(['proposito' => 'R', 'descricao' => 'Refeição']);
        DB::table('tipo_propositos')->insert(['proposito' => 'I', 'descricao' => 'Espiritualidade']);

        DB::table('tipo_atividades')->insert(['tipo_proposito_id' => 3, 'descricao' => 'Arrumar a cama']);
        DB::table('tipo_atividades')->insert(['tipo_proposito_id' => 4, 'descricao' => 'Preparar seu café da manhã']);
        DB::table('tipo_atividades')->insert(['tipo_proposito_id' => 1, 'descricao' => 'Estudar']);
        DB::table('tipo_atividades')->insert(['tipo_proposito_id' => 7, 'descricao' => 'Comer ao menos 4 tipos de alimentos']);
        DB::table('tipo_atividades')->insert(['tipo_proposito_id' => 8, 'descricao' => 'Fazer a oração antes das refeições ou antes de dormir']);
        DB::table('tipo_atividades')->insert(['tipo_proposito_id' => 5, 'descricao' => 'Fazer uma tarefa doméstica']);
        DB::table('tipo_atividades')->insert(['tipo_proposito_id' => 3, 'descricao' => 'Não brigar, responder ou falar palavrão']);
        DB::table('tipo_atividades')->insert(['tipo_proposito_id' => 3, 'descricao' => 'Não deixar suas coisas espalhadas pela casa']);
        DB::table('tipo_atividades')->insert(['tipo_proposito_id' => 1, 'descricao' => 'Fazer a tarefa']);
        DB::table('tipo_atividades')->insert(['tipo_proposito_id' => 5, 'descricao' => 'Lavar a louça']);
        DB::table('tipo_atividades')->insert(['tipo_proposito_id' => 5, 'descricao' => 'Cortar a grama']);
        DB::table('tipo_atividades')->insert(['tipo_proposito_id' => 5, 'descricao' => 'Varrer a casa']);
        DB::table('tipo_atividades')->insert(['tipo_proposito_id' => 5, 'descricao' => 'Cuidar do bicho de estimação']);

        DB::table('quadros')->insert(['user_id' => 1, 'tipo_quadro_id' => 1, 'recompensa' => 'Ir ao clube']);
        DB::table('criancas')->insert(['quadro_id' => 1, 'crianca' => 'Helena', 'genero' => 'F', 'idade' => 7]);

        DB::table('atividades')->insert(['quadro_id' => 1, 'tipo_atividade_id' => 1, 'valor' => 1]);
        DB::table('atividades')->insert(['quadro_id' => 1, 'tipo_atividade_id' => 2, 'valor' => 1]);
        DB::table('atividades')->insert(['quadro_id' => 1, 'tipo_atividade_id' => 3, 'valor' => 1]);
    }
}
