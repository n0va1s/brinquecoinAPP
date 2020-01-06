@extends('layout.app')

@section('titulo','Brinque Coin - Login')

@section('content')
<div class="container">
    <div class="row center-align">
        <div class="col l4 offset-l4">
            <h3>{{ __('Confirme seu email') }}</h3>

            @if (session('resent'))
            <div class="row green-text">
                {{ __('Um novo link foi enviado para o seu email.') }}
            </div>
            @endif

            {{ __('Antes de continuar, por favor verifique seu email e clique no link.') }}

            {{ __('Se vc não recebeu o email:') }}
            <form class="input-field inline" method="POST" action="{{ route('verification.resend') }}">
                {{ csrf_field() }}
                <button type="submit"
                    class="col s12 btn btn-large deep-orange">{{ __('Clique aqui para reenviar') }}</button>
            </form>
        </div>
    </div>
</div>
@endsection
