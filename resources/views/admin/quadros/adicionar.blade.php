@extends('layout.site')

@section('conteudo')
  <div class="container">
    <h3 class="center">Cadastre seu Quadro</h3>
    <div class="row">
      <form class="" action="{{route('admin.quadros.salvar')}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        @include('admin.quadros._form')
        <button class="btn deep-orange">Salvar</button>
      </form>
    </div>
  </div>
@endsection
