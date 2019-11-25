@extends('layout.site')

@section('conteudo')
  <div class="container">
    <h3 class="center">Atualize seu quadro</h3>
    <div class="row">
      <form action="{{route('admin.quadros.atualizar',$registro->id)}}" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="put">

        @include('admin.quadros._form')
        @include('admin.quadros._formAtividade')

        <div class="row">
            <button class="waves-light btn-small orange darken-2" type="submit" name="action">Atualizar</button>
        </div>
      </form>
    </div>
  </div>
@endsection
