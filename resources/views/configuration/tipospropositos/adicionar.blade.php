@extends('layout.app')

@section('content')
<div class="container">
  <h3 class="center">Tipos de Propósitos</h3>
  <div class="row">
    <div class="container">
      <form class="" action="{{route('propouse.type.save')}}" method="post"
        enctype="multipart/form-data">
        {{ csrf_field() }}
        @include('configuration.tipospropositos._form')
        <button class="btn orange darken-2">Salvar</button>
      </form>
    </div>
  </div>
</div>
@endsection