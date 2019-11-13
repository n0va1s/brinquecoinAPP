@extends('layout.site')

@section('conteudo')
  <div class="container">
    <h3 class="center">Atualize seu quadro</h3>
    <div class="row">
      <form class="" action="{{route('admin.quadros.atualizar',$registro->id)}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="put">
        @include('admin.quadros._form')
        <a class="waves-effect waves-light btn-small red darken-2"><i class="material-icons left">save</i>Atualizar</a>
      </form>
    </div>
  </div>
@endsection
