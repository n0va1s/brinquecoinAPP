@extends('layout.site')

@section('titulo','Cursos')

@section('conteudo')
  <div class="container">
    <h3 class="center">Acesse</h3>
    <div class="row">
      <div class="col s12 m6">
        <form action="{{route('site.login.entrar')}}" method="post">
          {{ csrf_field() }}

          <div class="input-field">
            <label>E-mail</label>
            <input type="text" name="email">
          </div>

          <div class="input-field">
            <label>Senha</label>
            <input type="password" name="senha">
          </div>

          <button class="btn deep-orange">Entrar</button>
        </form>
      </div>
    </div>
  </div>
@endsection
