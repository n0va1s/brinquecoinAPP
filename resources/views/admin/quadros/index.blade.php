@extends('layout.site')

@section('conteudo')
<div class="container">
    <h3 class="center">Seus quadros</h3>
    @if (count($registros) === 0)
    <div class="row center">
        <img width="50%" src="{{ asset('img/quadro.png') }}" alt="Um quadro de tarefas de exemplo">
        <h5>Nenhum quadro por aqui...</h5>
        <a class="btn-floating btn-large waves-effect waves-light red" href="{{route('admin.quadros.adicionar')}}">
            <i class="material-icons">add</i>
        </a>
    </div>
    @endif
    <div class="row">
        @foreach ($registros as $registro)
        <div class="col s12 m4">
            <div class="card">
                <a href="{{route('admin.quadros.exibir',$registro->id)}}">
                    <div class="card-image">
                        <img src="{{ asset('img/tiposquadros/ferias.jpg') }}" alt="Imagem do tipo do quadro">
                    </div>
                </a>
                <div class="card-content">
                    <p>Quadro de Viagem</p>
                    <br />
                    <p>João Pedro</p>
                    <br />
                    <p>{{ $registro->recompensa }}</p>
                </div>
                <div>
                    <div class="card-action center">
                        <a class="waves-effect waves-light btn-small orange darken-2">Duplicar</a>
                        <a class="waves-effect waves-light btn-small cyan darken-2">Encerrar</a>
                    </div>
                </div>
            </div>
        </div>
        
        @endforeach
    </div>
</div>
@endsection
