@extends('layout.app')

@section('content')
<div class="container">
  <h3 class="center">Tipos de Atividades</h3>
  <div class="row">
    <div class="container">
      <form class="" action="{{route('activity.type.update',$data->id)}}" method="post"
        enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" value="put">
        @include('configuration.tiposatividades._form')
        <button class="btn orange darken-2">Atualizar</button>
      </form>
    </div>
  </div>
</div>
@endsection