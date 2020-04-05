@extends('layout.app')

@section('titulo','Brinque Coin - Quadros')

@section('content')
<div class="container">
    <div class="fixed-action-btn">
        <a class="btn-floating btn-large red">
            <i class=" large material-icons">add</i>
        </a>
        <ul>
            <li>
                <a class="btn-floating orange" href="{{route('board.allowance.create')}}">
                    <i title="Quando de mesada" class="material-icons">attach_money</i>
                </a>
            </li>
            <li>
                <a class="btn-floating green" href="{{route('board.task.create')}}">
                    <i title="Quando de tarefa" class="material-icons">check</i>
                </a>
            </li>
            <li>
                <a class="btn-floating blue" href="{{route('board.habit.create')}}">
                    <i title="Quando de hábito" class="material-icons">directions_run</i>
                </a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col s12 m11">
            <h3 class="center">Seus quadros</h3>
        </div>
    </div>
    @if (count($boards) === 0)
    <div class="row center">
        <img width="50%" src="{{ asset('img/quadro.png') }}" alt="Um quadro de tarefas de exemplo">
        <h5>Nenhum quadro por aqui...</h5>
    </div>
    @endif
    <div class="row">
        @foreach ($boards as $board)
        <div class="col s12 m4">
            <div class="card">
                <a href="{{route('board.show',$board->code)}}">
                    <div class="card-image">
                        <img height="200px" src="{{ asset($board->image) }}" alt="Imagem do tipo do quadro">
                    </div>
                </a>
                <div class="card-content">
                    <p class="center-align">Quadro de {{ $board->type }}</p>
                    <p class="center-align"><b>{{ $board->name }}</b></p>
                    <p class="truncate">{{ $board->goal }}</p>
                </div>
                <div class="card-action grey lighten-3">
                    <div class="row">
                        <div class="col s7 offset-s2 center">
                            <a href="{{route('board.show',$board->code)}}"
                                class="waves-light btn-small orange darken-2" title="Abrir o quadro">
                                Abrir
                            </a>
                        </div>
                        <div class="col s2 right">
                            <a class='dropdown-trigger' href='#' data-target='options'>
                            <i title="Administre seu quadro" class="material-icons">more_vert</i></a>
                            <ul id='options' class='dropdown-content'>
                                <li>
                                    @if($board->type === 'Mesada')
                                    <a href="{{route('board.allowance.edit',$board->code)}}"
                                        title="Alterar as atividades do quadro">Alterar
                                    </a>
                                    @elseif($board->type === 'Tarefa')
                                    <a href="{{route('board.task.edit',$board->code)}}"
                                        title="Alterar as atividades do quadro">Alterar
                                    </a>
                                    @elseif($board->type === 'Hábito')
                                    <a href="{{route('board.habit.edit',$board->code)}}"
                                        title="Alterar as atividades do quadro">Alterar
                                    </a>
                                    @endif
                                </li>
                                <li>
                                    <a href="{{route('board.copy',$board->code)}}"
                                        title="Duplicar o quadro">Duplicar
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('board.close',$board->code)}}"
                                        title="Encerrar o quadro">Fechar
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
