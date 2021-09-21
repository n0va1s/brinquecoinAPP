@extends('layout.app')

@section('content')
<div class="container">
  <h3 class="center">Tipos de Atividades</h3>
  <div class="row">
    <div class="container">
      <form class="" action="{{route('activity.type.store')}}" method="post"
        enctype="multipart/form-data">
        @csrf
        @include('configuration.tiposatividades._form')
        <button class="btn orange darken-2">Salvar</button>
      </form>
    </div>
  </div>
</div>
@endsection