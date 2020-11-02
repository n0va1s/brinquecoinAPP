@extends('layout.app')

@section('titulo','Brinque Coin - Confirme o cancelamento')

@section('content')
<div class="container">
    <div class="row center">
        <h3 class="center-align">Confirme o cancelamento</h3>
        <p class="center-align">Nosso objetivo não é aprisionar, mas sim ajudar na criação de filhos felizes e realizados</p>
        <img src="{{ asset('img/ilustrations/undraw_Throw_away_re_x60k.svg') }}" 
        alt="Imagem ilustrativa de uma pessoa jogando um papel no lixo"
        height="100rem">
        <p>Seus dados serão cancelados. Confirma?</p>
        <a class="waves-effect waves-light btn-large red darken-2" 
        href="{{route('user.cancel')}}">Confirmo</a>
    </div>
</div>
@endsection