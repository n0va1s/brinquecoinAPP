@extends('layout.site')

@section('conteudo')
  <div class="container">
    <h3 class="center">Tipos de Propósitos</h3>
    <div class="row">
      <div class="container">
        <form class="" action="{{route('admin.configuracao.tipospropositos.salvar')}}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          @include('admin.configuracao.tipospropositos._form')
          <button class="btn orange darken-2">Salvar</button>
        </form>
      </div>
    </div>
  </div>
@endsection
