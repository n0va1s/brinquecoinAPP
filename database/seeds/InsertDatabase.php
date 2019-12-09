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
        $user = [
            'name' => 'João Paulo',
            'email' => 'jp.trabalho@gmail.com',
            'password' => bcrypt('linux1')
        ];
        //Verifica se esse o usuario ja existe
        if (User::where('email', '=', $user['email'])->count()) {
            DB::table('users')->update($user);
        } else {
            DB::table('users')->insert($user);
        }
        //Registros das tabelas basicas
        DB::table('board_types')->insert(['type' => 'F', 'name' => 'Férias', 'image' => 'img/tiposquadros/ferias.jpg']);
        DB::table('board_types')->insert(['type' => 'H', 'name' => 'Hábito', 'image' => 'img/tiposquadros/habito.png']);
        DB::table('board_types')->insert(['type' => 'M', 'name' => 'Mesada', 'image' => 'img/tiposquadros/mesada.jpg']);
        DB::table('board_types')->insert(['type' => 'T', 'name' => 'Tarefa', 'image' => 'img/tiposquadros/tarefas.jpg']);

        DB::table('propouse_types')->insert(['propouse' => 'E', 'name' => 'Escola', 'icon' => 'school']);
        DB::table('propouse_types')->insert(['propouse' => 'H', 'name' => 'Higiene', 'icon' => 'hot_tub']);
        DB::table('propouse_types')->insert(['propouse' => 'C', 'name' => 'Comportamento', 'icon' => 'insert_emoticon']);
        DB::table('propouse_types')->insert(['propouse' => 'A', 'name' => 'Autonomia', 'icon' => 'games']);
        DB::table('propouse_types')->insert(['propouse' => 'D', 'name' => 'Casa', 'icon' => 'home']);
        DB::table('propouse_types')->insert(['propouse' => 'F', 'name' => 'Exercício', 'icon' => 'directions_bike']);
        DB::table('propouse_types')->insert(['propouse' => 'R', 'name' => 'Refeição', 'icon' => 'restaurant']);
        DB::table('propouse_types')->insert(['propouse' => 'I', 'name' => 'Espiritualidade', 'icon' => 'record_voice_over']);

        DB::table('activity_types')->insert(['propouse_type_id' => 3, 'name' => 'Arrumar a cama']);
        DB::table('activity_types')->insert(['propouse_type_id' => 4, 'name' => 'Preparar seu café da manhã']);
        DB::table('activity_types')->insert(['propouse_type_id' => 1, 'name' => 'Estudar']);
        DB::table('activity_types')->insert(['propouse_type_id' => 7, 'name' => 'Comer ao menos 4 tipos de alimentos']);
        DB::table('activity_types')->insert(['propouse_type_id' => 8, 'name' => 'Fazer a oração antes das refeições ou antes de dormir']);
        DB::table('activity_types')->insert(['propouse_type_id' => 5, 'name' => 'Fazer uma tarefa doméstica']);
        DB::table('activity_types')->insert(['propouse_type_id' => 3, 'name' => 'Não brigar, responder ou falar palavrão']);
        DB::table('activity_types')->insert(['propouse_type_id' => 3, 'name' => 'Não deixar suas coisas espalhadas pela casa']);
        DB::table('activity_types')->insert(['propouse_type_id' => 1, 'name' => 'Fazer a tarefa']);
        DB::table('activity_types')->insert(['propouse_type_id' => 5, 'name' => 'Lavar a louça']);
        DB::table('activity_types')->insert(['propouse_type_id' => 5, 'name' => 'Cortar a grama']);
        DB::table('activity_types')->insert(['propouse_type_id' => 5, 'name' => 'Varrer a casa']);
        DB::table('activity_types')->insert(['propouse_type_id' => 5, 'name' => 'Cuidar do bicho de estimação']);
    }
}
