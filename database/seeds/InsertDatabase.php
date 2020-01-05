<?php

use Illuminate\Database\Seeder;

class InsertDatabase extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Basic
        DB::table('board_types')->insert(['type' => 'G', 'name' => 'Meta', 'image' => 'img/boards/ferias.jpg']);
        DB::table('board_types')->insert(['type' => 'H', 'name' => 'Hábito', 'image' => 'img/boards/habito.jpg']);
        DB::table('board_types')->insert(['type' => 'M', 'name' => 'Mesada', 'image' => 'img/boards/mesada.jpg']);
        DB::table('board_types')->insert(['type' => 'T', 'name' => 'Tarefa', 'image' => 'img/boards/tarefas.jpg']);
        // Maslow
        DB::table('propouse_types')->insert(['propouse' => 'R', 'name' => 'Escola', 'icon' => 'school']);
        DB::table('propouse_types')->insert(['propouse' => 'F', 'name' => 'Higiene', 'icon' => 'hot_tub']);
        DB::table('propouse_types')->insert(['propouse' => 'R', 'name' => 'Comportamento', 'icon' => 'insert_emoticon']);
        DB::table('propouse_types')->insert(['propouse' => 'R', 'name' => 'Autonomia', 'icon' => 'games']);
        DB::table('propouse_types')->insert(['propouse' => 'F', 'name' => 'Casa', 'icon' => 'home']);
        DB::table('propouse_types')->insert(['propouse' => 'E', 'name' => 'Exercício', 'icon' => 'directions_bike']);
        DB::table('propouse_types')->insert(['propouse' => 'F', 'name' => 'Refeição', 'icon' => 'restaurant']);
        DB::table('propouse_types')->insert(['propouse' => 'E', 'name' => 'Espiritualidade', 'icon' => 'record_voice_over']);
        // Examples
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

        DB::table('propouse_types')->insert(['propouse' => 'H', 'name' => 'Hábito', 'icon' => 'all_inclusive']);

        DB::table('activity_types')->insert(['propouse_type_id' => 9, 'name' => 'Semana 1']);
        DB::table('activity_types')->insert(['propouse_type_id' => 9, 'name' => 'Semana 2']);
        DB::table('activity_types')->insert(['propouse_type_id' => 9, 'name' => 'Semana 3']);

        /*
        DB::table('propouse_types')->insert(['propouse' => 'P', 'name' => 'Desenvolvimento Intelectual', 'icon' => 'favorite']);
        DB::table('propouse_types')->insert(['propouse' => 'P', 'name' => 'Saúde e Disposição', 'icon' => 'favorite']);
        DB::table('propouse_types')->insert(['propouse' => 'P', 'name' => 'Equilíbrio Emocional', 'icon' => 'favorite']);
        DB::table('propouse_types')->insert(['propouse' => 'W', 'name' => 'Recursos Financeiros', 'icon' => 'business']);
        DB::table('propouse_types')->insert(['propouse' => 'W', 'name' => 'Contribuição Social', 'icon' => 'business']);
        DB::table('propouse_types')->insert(['propouse' => 'W', 'name' => 'Realização e Propósito', 'icon' => 'business']);
        DB::table('propouse_types')->insert(['propouse' => 'Q', 'name' => 'Criatividade, Hobbies e Diversão', 'icon' => 'nature_people']);
        DB::table('propouse_types')->insert(['propouse' => 'Q', 'name' => 'Plenitude e Felicidade', 'icon' => 'nature_people']);
        DB::table('propouse_types')->insert(['propouse' => 'Q', 'name' => 'Espiritualidade', 'icon' => 'nature_people']);
        DB::table('propouse_types')->insert(['propouse' => 'L', 'name' => 'Vida Social', 'icon' => 'cake']);
        DB::table('propouse_types')->insert(['propouse' => 'L', 'name' => 'Relacionamento Amoroso', 'icon' => 'cake']);
        DB::table('propouse_types')->insert(['propouse' => 'L', 'name' => 'Família', 'icon' => 'cake']);

        DB::table('activity_types')->insert(['propouse_type_id' => 18, 'name' => 'Ler ao menos 3 páginas de um livro por dia']);
        DB::table('activity_types')->insert(['propouse_type_id' => 19, 'name' => 'Fazer exercício 3 vezes por semana']);
        DB::table('activity_types')->insert(['propouse_type_id' => 20, 'name' => 'Meditar 5 minutos por dia']);
        DB::table('activity_types')->insert(['propouse_type_id' => 21, 'name' => 'Economizar no cafezinho']);
        DB::table('activity_types')->insert(['propouse_type_id' => 22, 'name' => 'Separar o lixo diariamente']);
        DB::table('activity_types')->insert(['propouse_type_id' => 23, 'name' => 'Desenvolver meu propósito durante 21 dias']);
        DB::table('activity_types')->insert(['propouse_type_id' => 24, 'name' => 'Escutar um podcast diariamente']);
        DB::table('activity_types')->insert(['propouse_type_id' => 23, 'name' => 'Exercitar a gratidão antes de dormir']);
        DB::table('activity_types')->insert(['propouse_type_id' => 25, 'name' => 'Rezar o terço durante 21 dias']);
        DB::table('activity_types')->insert(['propouse_type_id' => 26, 'name' => 'Durante 21 dias, procurar reaproximar de pessoas queridas']);
        DB::table('activity_types')->insert(['propouse_type_id' => 27, 'name' => 'Surpreender a pessoa amada diariamente']);
        DB::table('activity_types')->insert(['propouse_type_id' => 28, 'name' => 'Contar uma história para as crianças antes de dormir']);
        */
    }
}
