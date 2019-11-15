@extends('layout.site')

@section('conteudo')
<div class="container">
    <h3 class="center">Suas cápsulas do tempo</h3>
    @if (count($registros) === 0)
    <div class="row center">
        <img src="{{ asset('img/capsula.jpg') }}" alt="Imagem ilustrativa da capsula do tempo">
        <h5>Nenhuma cápsula por aqui...</h5>
        <a class="btn-floating btn-large waves-effect waves-light red" href="{{route('admin.capsula.adicionar')}}">
            <i class="material-icons">add</i>
        </a>
    </div>
    @endif
    <div class="row">
        @foreach ($registros as $registro)
        <div class="col s4 m4">
            <div class="card">
                <div class="card-image">
                    <img src="{{ asset('img/capsula.jpg') }}" alt="Imagem ilustrativa da capsula do tempo">
                </div>
                <div class="card-content">
                    <p>De: {{$registro->nomeDe}}</p>
                    <br />
                    <p>Para: {{$registro->nomePara}}</p>
                    <br />
                    <p>Data: {{date('j F, Y', strtotime($registro->avisadoEm))}}</p>
                </div>
                <div>
                    <div class="card-action center">
                        <a class="waves-effect waves-light btn-small red darken-2">Cancelar</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
