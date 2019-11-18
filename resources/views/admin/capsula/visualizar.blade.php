@extends('layout.site')

@section('conteudo')
  <div class="container">
    <h3 class="center">Esta é a sua cápsula do tempo</h3>
    <div class="row">
      <form action="{{route('admin.capsula.salvar')}}" method="post">
        {{ csrf_field() }}
        @include('admin.quadros._form')
        <div class="row">
            <button class="waves-light btn-small orange darken-2" type="submit" name="action">Fechar</button>
        </div>
      </form>
    </div>
  </div>
@endsection
