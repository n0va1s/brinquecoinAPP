@extends('layout.site')

@section('titulo','BrinqueCoin - meus quadros')

@section('conteudo')
  <div class="container">
    <h3 class="center">Lista de Quadros</h3>
    <div class="row">
      @foreach($registros as $registro)
        <div class="col s12 m4">
          <div class="card">
            <div class="card-image">
              <img src="{{asset($curso->imagem)}}">
            </div>
            <div class="card-content">
              <h4>{{$registro->titulo}}</h4>
              <p>{{$registro->descricao}}</p>
            </div>
            <div class="card-action">
              <a href="#">Ver mais...</a>
            </div>
          </div>
        </div>
      @endforeach
    </div>


  </div>




@endsection
