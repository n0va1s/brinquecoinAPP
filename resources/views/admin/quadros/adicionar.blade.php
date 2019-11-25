@extends('layout.site')

@section('conteudo')
  <div class="container">
    <h3 class="center">Cadastre seu quadro</h3>
    <div class="row">
        <form action="{{route('admin.quadros.salvar')}}" method="post">
            {{ csrf_field() }}
            @include('admin.quadros._form')

            <div class="row">
                <button class="waves-light btn-small orange darken-2" type="submit" name="action">Salvar</button>
                <button class="waves-light btn-small cyan darken-2 modal-trigger" href="#modalAtividade">Novas Atividades</button>
            </div>
        </form>
        <div id="modalAtividade" class="modal">
          <div class="modal-content">
            <h3>Cadastre novas atividades</h3>
            <form action="{{route('admin.configuracao.tiposatividades.salvar')}}" method="post">
                <div class="input-field col s12 m4">
                    <select name="tipo_proposito_id">
                        <option value="" disabled selected>Propósito</option>
                        @foreach ($tiposPropositos as $tipo)
                            <option value="{{$tipo->id}}">{{$tipo->descricao}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-field col s12 m8">
                    <label>Atividade</label>
                    <input type="text" name="descricao" value="{{isset($registro->descricao) ? $registro->descricao : ''}}">
                </div>
                <div class="file-field  input-field">
                    <div class="btn-small cyan darken-2">
                        <span>Imagem</span>
                        <input type="file" name="imagem">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                    </div>
                </div>
                <div class="row">
                    <button class="waves-light btn-small orange darken-2" type="submit" name="action">Salvar</button>
                    <button class="waves-light btn-small red darken-2" type="submit" name="action">Fechar</button>
                </div>
            </form>
          </div>
        </div>
    </div>
  </div>
@endsection
