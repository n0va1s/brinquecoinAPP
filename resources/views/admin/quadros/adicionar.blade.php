@extends('layout.site')

@section('conteudo')
  <div class="container">
    <h3 class="center">Cadastre seu quadro</h3>
    <div class="row">
      <form class="" action="{{route('admin.quadros.salvar')}}" method="post">
        {{ csrf_field() }}
        @include('admin.quadros._form')
        <a class="waves-effect waves-light btn-small orange darken-2">Salvar</a>
      </form>
    </div>
  </div>
@endsection
