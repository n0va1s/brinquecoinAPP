@extends('layout.app')

@section('content')
<div class="container">
  <h3 class="center">Tipos de Propósitos</h3>
  <div class="row">
    <div class="container">
      <form class="" action="{{route('propouse.type.update',$registro->id)}}" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="put">
        @include('configuration.tipospropositos._form')
        <button class="btn orange darken-2">Atualizar</button>
      </form>
    </div>
  </div>
</div>
@endsection