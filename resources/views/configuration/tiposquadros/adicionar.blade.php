@extends('layout.app')

@section('content')
<div class="container">
  <h3 class="center">Tipos de Quadros</h3>
  <div class="row">
    <div class="container">
      <form class="" action="{{route('board.type.store')}}" method="post"
        enctype="multipart/form-data">
        {{ csrf_field() }}
        @include('configuration.tiposquadros._form')
        <button class="btn orange darken-2">Salvar</button>
      </form>
    </div>
  </div>
</div>
@endsection