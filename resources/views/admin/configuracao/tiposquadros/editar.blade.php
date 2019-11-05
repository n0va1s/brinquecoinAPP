@extends('layout.site')

@section('conteudo')
  <div class="container">
    <h3 class="center">Tipos de Quadros</h3>
    <div class="row">
      <div class="container">
        <form class="" action="{{route('admin.configuracao.tiposquadros.atualizar',$registro->id)}}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          <input type="hidden" name="_method" value="put">
          @include('admin.configuracao.tiposquadros._form')
          <button class="btn deep-orange">Atualizar</button>
        </form>
      </div>
    </div>
  </div>
@endsection
