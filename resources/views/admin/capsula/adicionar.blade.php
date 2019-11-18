@extends('layout.site')

@section('conteudo')
  <div class="container">
    <h3 class="center">Cadastre sua cápsula do tempo</h3>
    <div class="row">
      <form action="{{route('admin.capsula.salvar')}}" method="post">
        {{ csrf_field() }}
        @include('admin.capsula._form')
        <div class="row">
            <button onclick="M.toast({html: 'Cápsula lacrada!'})" class="waves-light btn-small orange darken-2" type="submit" name="action">Salvar</button>
        </div>
      </form>
    </div>
  </div>
@endsection
