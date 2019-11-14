@extends('layout.site')

@section('conteudo')
<div class="container">
    <h3 class="center">Meus quadros</h3>
    <div class="row">
        @foreach ($registros as $registro)
        <div class="col s4 m4">
            <div class="card">
                <div class="card-image">
                    <img src="{{asset('img/tiposquadros/viagem.jpg')}}">
                </div>
                <div class="card-content">
                    <p>Quadro de Viagem</p>
                    <br />
                    <p>João Pedro</p>
                </div>
                <div>
                    <div class="card-action center">
                         <a class="waves-effect waves-light btn-small orange darken-2">Duplicar</a>
                         <a class="waves-effect waves-light btn-small grey darken-2">Encerrar</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
