@extends('layout.app')

@section('titulo','Brinque Coin - Cápsula do Tempo')

@section('content')
<div class="container">
    <div class="fixed-action-btn">
        <a class="btn-floating btn-large red" href="{{route('capsule.create')}}">
            <i class=" large material-icons">add</i>
        </a>
    </div>
    <div class="row">
        <div class="col s12 m11">
            <h3 class="center">Suas cápsulas do tempo</h3>
        </div>
    </div>
    @if (count($registros) === 0)
    <div class="row center">
        <img src="{{ asset('img/capsula.jpg') }}" alt="Imagem ilustrativa da capsula do tempo">
        <h5>Nenhuma cápsula por aqui...</h5>
    </div>
    @endif
    <div class="row">
        @foreach ($registros as $registro)
        <div class="col s12 m4">
            <div class="card">
                <div class="card-image">
                    <img src="{{ asset('img/capsula.jpg') }}" alt="Imagem ilustrativa da capsula do tempo">
                </div>
                <div class="card-content">
                    <p>De: {{$registro->nomeDe}}</p>
                    <br />
                    <p>Para: {{$registro->nomePara}}</p>
                    <br />
                    <p>Data: {{date('d/m/Y', strtotime($registro->avisadoEm))}}</p>
                </div>
                <div class="grey lighten-3">
                    <div class="card-action center">
                        <a class="waves-light btn-small red darken-2"
                            href="{{route('admin.capsula.deletar', $registro->codigo)}}">Cancelar</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="row">
        {{ $registros->links() }}
    </div>
</div>
@endsection