@extends('layout.site')

@section('conteudo')
  <div class="container">
    <h3 class="center">Quadro de João Pedro <i class="material-icons">date_range</i></h3>
    <hr class="linha">
    <h5 class="center">Você conseguiu 12 dos 48 pontos (20%) para ir ao clube</h5>
    <div class="row">
         <table class="responsive-table hide-on-med-and-down">
            <thead>
                <tr>
                    <th>&nbsp;</th>
                    <th>Atividade</th>
                    <th>Segunda</th>
                    <th>Terça</th>
                    <th>Quarta</th>
                    <th>Quinta</th>
                    <th>Sexta</th>
                    <th>Sábado</th>
                    <th>Domingo</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><img width="100" src="{{ asset('img/quadros/arrumar-cama.jpg') }}"></td>
                    <td>Arrumar a cama</td>
                    <td><img src="{{ asset('img/quadros/nao-fez.png') }}"></td>
                    <td><img src="{{ asset('img/quadros/nao-pode.png') }}"></td>
                    <td><img src="{{ asset('img/quadros/feito.png') }}"></td>
                    <td><img src="{{ asset('img/quadros/nao-fez.png') }}"></td>
                    <td><img src="{{ asset('img/quadros/nao-pode.png') }}"></td>
                    <td><img src="{{ asset('img/quadros/feito.png') }}"></td>
                    <td><img src="{{ asset('img/quadros/feito.png') }}"></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="row hide-on-med-and-up">
        <ul class="collapsible">
            <li>
                <div class="collapsible-header grey darken-3 white-text"><b>Segunda</b></div>
                <div class="collapsible-body">
                    <div class="row">
                        <div class="col s6">
                            <span><b>Atividade</b></span>
                        </div>
                        <div class="col s6">
                            <span><b>Situação</b></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s6">
                            <span>Arrumar a cama</span>
                        </div>
                        <div class="col s6">
                            <img src="{{ asset('img/quadros/feito.png') }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s6">
                            <span>Fazer seu café da manhã</span>
                        </div>
                        <div class="col s6">
                            <img src="{{ asset('img/quadros/feito.png') }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s6">
                            <span>Arrumar sua mochila</span>
                        </div>
                        <div class="col s6">
                            <img src="{{ asset('img/quadros/feito.png') }}">
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="collapsible-header grey darken-3 white-text"><b>Terça</b></div>
                <div class="collapsible-body">
                    <div class="row">
                        <div class="col s6">
                            <span><b>Atividade</b></span>
                        </div>
                        <div class="col s6">
                            <span><b>Situação</b></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s6">
                            <span>Arrumar a cama</span>
                        </div>
                        <div class="col s6">
                            <img src="{{ asset('img/quadros/feito.png') }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s6">
                            <span>Fazer seu café da manhã</span>
                        </div>
                        <div class="col s6">
                            <img src="{{ asset('img/quadros/feito.png') }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s6">
                            <span>Arrumar sua mochila</span>
                        </div>
                        <div class="col s6">
                            <img src="{{ asset('img/quadros/feito.png') }}">
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="collapsible-header grey darken-3 white-text"><b>Quarta</b></div>
                <div class="collapsible-body">Nada...
                </div>
            </li>
            <li>
                <div class="collapsible-header grey darken-3 white-text"><b>Quinta</b></div>
                <div class="collapsible-body">Nada...
                </div>
            </li>
            <li>
                <div class="collapsible-header grey darken-3 white-text"><b>Sexta</b></div>
                <div class="collapsible-body">Nada...
                </div>
            </li>
            <li>
                <div class="collapsible-header grey darken-3 white-text"><b>Sábado</b></div>
                <div class="collapsible-body">Nada...
                </div>
            </li>
            <li>
                <div class="collapsible-header grey darken-3 white-text"><b>Domingo</b></div>
                <div class="collapsible-body">Nada...
                </div>
            </li>
          </ul>
    </div>
    <div class="row">
        <a class="waves-effect waves-light btn-small orange darken-2">Salvar</a>
    </div>
  </div>
@endsection
<style>
hr {
	border-top: 1px solid #8c8b8b;
	border-bottom: 1px solid #fff;
}
</style>