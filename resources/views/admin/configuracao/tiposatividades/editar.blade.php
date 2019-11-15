@extends('layout.site')

@section('conteudo')
  <div class="container">
    <h3 class="center">Tipos de Atividades</h3>
    <div class="row">
      <div class="container">
        <form class="" action="{{route('admin.configuracao.tiposatividades.atualizar',$registro->id)}}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          <input type="hidden" name="_method" value="put">
          @include('admin.configuracao.tiposatividades._form')
          <button class="btn orange darken-2">Atualizar</button>
        </form>
      </div>
    </div>
  </div>
@endsection
