@extends('layout.site')

@section('conteudo')
  <div class="container">
    <h3 class="center">Atualize seu quadro</h3>
    <div class="row">
      <form class="" action="{{route('admin.quadros.atualizar',$registro->id)}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="put">
        @include('admin.quadros._form')
        <button class="btn deep-orange">Atualizar</button>
      </form>
    </div>
  </div>
@endsection
