@extends('layout.site')

@section('conteudo')
<div class="container">
    <div class="row"></div>
    <div class="row">
        <div class="col s10 m8">
            <h3 class="right">Suas cápsulas do tempo</h3>
        </div>
        <div class="col s2 m4 valign-wrapper">
            <a class="btn-floating btn-large waves-light red" href="{{route('admin.capsula.adicionar')}}">
                <i class="material-icons">add</i>
            </a>
        </div>
    </div>
    @if (count($registros) === 0)
    <div class="row center">
        <img src="{{ asset('img/capsula.jpg') }}" alt="Imagem ilustrativa da capsula do tempo">
        <h5>Nenhuma cápsula por aqui...</h5>
        <a class="btn-floating btn-large waves-light red" href="{{route('admin.capsula.adicionar')}}">
            <i class="material-icons">add</i>
        </a>
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
                        <a class="waves-light btn-small red darken-2" href="{{route('admin.capsula.deletar', $registro->codigo)}}">Cancelar</a>
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
