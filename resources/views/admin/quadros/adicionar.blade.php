@extends('layout.site')

@section('conteudo')
  <div class="container">
    <h3 class="center">Cadastre seu quadro</h3>
    <div class="row">
      <form class="" action="{{route('admin.quadros.salvar')}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        @include('admin.quadros._form')
        <a class="waves-effect waves-light btn-small red darken-2"><i class="material-icons left">save</i>Salvar</a>
      </form>
    </div>
  </div>
@endsection
