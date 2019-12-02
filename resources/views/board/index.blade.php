@extends('layout.site')

@section('conteudo')
<div class="container">
    <div class="fixed-action-btn">
        <a class="btn-floating btn-large red">
            <i class=" large material-icons">add</i>
        </a>
        <ul>
            <li>
                <a class="btn-floating red" href="{{route('board.allowance.create')}}">
                    <i title="Quando de mesada" class="material-icons">attach_money</i>
                </a>
            </li>
            <li>
                <a class="btn-floating yellow darken-1" href="{{route('board.task.create')}}">
                    <i title="Quando de tarefas" class="material-icons">check</i>
                </a>
            </li>
            <li>
                <a class="btn-floating green" href="{{route('board.vacation.create')}}">
                    <i title="Quando de férias" class="material-icons">flight</i>
                </a>
            </li>
            <li>
                <a class="btn-floating blue href=" {{route('board.habit.create')}}">
                    <i title="Quando de hábitos" class="material-icons">directions_run</i>
                </a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col s12 m11">
            <h3 class="center">Seus quadros</h3>
        </div>
    </div>
    @if (count($registros) === 0)
    <div class="row center">
        <img width="50%" src="{{ asset('img/quadro.png') }}" alt="Um quadro de tarefas de exemplo">
        <h5>Nenhum quadro por aqui...</h5>
    </div>
    @endif
    <div class="row">
        @foreach ($registros as $registro)
        <div class="col s12 m4">
            <div class="card">
                <a href="{{route('board.show',$registro->id)}}">
                    <div class="card-image">
                        <img src="{{ asset($registro->imagem) }}" alt="Imagem do tipo do quadro">
                    </div>
                </a>
                <div class="card-content">
                    <p>Quadro de {{ $registro->descricao }}</p>
                    <br />
                    <p>{{ $registro->nome }}</p>
                    <br />
                    <p>{{ $registro->recompensa }}</p>
                </div>
                <div class="grey lighten-3">
                    <div class="card-action center">
                        <a class="waves-light btn-small orange darken-2">Duplicar</a>
                        <a class="waves-light btn-small cyan darken-2">Encerrar</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
