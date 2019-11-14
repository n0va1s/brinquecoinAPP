@extends('layout.site')

@section('conteudo')
  <div class="container">
    <h3 class="center">Atualize seu quadro</h3>
    <div class="row">
      <form class="" action="{{route('admin.quadros.atualizar',$registro->id)}}" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="put">
        @include('admin.quadros._form')
        <a class="waves-effect waves-light btn-small orange darken-2">Atualizar</a>
      </form>
    </div>
  </div>
@endsection
