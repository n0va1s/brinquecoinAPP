@extends('layout.site')

@section('titulo','Cursos')

@section('conteudo')
  <div class="section"></div>
  <main>
    <center>
      <h3>Acesse</h3>
      <div class="container">
        <div class="z-depth-1 grey lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">

          <form class="col s12" method="post" action="{{route('site.login.entrar')}}">
            {{ csrf_field() }}
            <div class='row'>
              <div class='input-field col s12'>
                <input class='validate' type='email' name='email' id='email' />
                <label for='email'>Seu email</label>
              </div>
            </div>

            <div class='row'>
              <div class='input-field col s12'>
                <input class='validate' type='password' name='senha' id='senha' />
                <label for='password'>Sua senha</label>
              </div>
              <label style='float: right;'>
                    <a href='#!'><b>Esqueceu a senha?</b></a>
              </label>
              <label style='float: left'>
                  <a href="#!"><b>Criar conta</b></a>
              </label>
            </div>

            <br />
            <center>
              <div class='row'>
                <button type='submit' name='btn_login' class='col s12 btn btn-large waves-effect deep-orange'>Entrar</button>
              </div>
            </center>
          </form>
        </div>
      </div>

    </center>
  </main>
@endsection
