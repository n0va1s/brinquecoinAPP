@extends('layout.site')

@section('conteudo')
  <div class="container">
    <h3 class="center">Cadastre seu quadro</h3>
    <div class="row">
      <form class="" action="{{route('admin.quadros.salvar')}}" method="post">
        {{ csrf_field() }}
        @include('admin.quadros._form')
        <a class="waves-effect waves-light btn-small orange darken-2">Salvar</a>
        <a class="waves-effect waves-light btn-small cyan modal-trigger" href="#modalAtividade">Novas Atividades</a>

        <div id="modalAtividade" class="modal">
          <div class="modal-content">
            <h3>Cadastre as atividades</h3>
            <p>Content of the modal goes here. Place marketing text or other information here.</p>
          </div>
          <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-red btn red lighten-1">Close</a>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection
