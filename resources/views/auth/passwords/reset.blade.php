@extends('layout.app')

@section('titulo','Brinque Coin - Login')

@section('content')
<div class="container center-align">
    <div class="row">
        <div class="col l4 offset-l4">
            <h3>{{ __('Nova senha') }}</h3>

            @if (session('resent'))
            <div class="row green-text">
                {{ __('Enviamos um email com as instruções.') }}
            </div>
            @endif

            <form method="POST" action="{{ route('password.update') }}">
                {{ csrf_field() }}
                <input type="hidden" name="token" value="{{ $token }}">
                <div class='row'>
                    <div class='input-field col s12'>
                        <input type='email' name='email' id='email' value="{{ old('email') }}" required
                            autocomplete="email" autofocus />
                        <label for='email'>{{ __('E-Mail') }}</label>
                    </div>
                    <div class='input-field col s12'>
                        <input class='validate' type='password' name='password' id='password' required
                            autocomplete="current-password" />
                        <label for='password'>{{ __('Senha') }}</label>
                    </div>
                    <div class='input-field col s12'>
                        <input class='validate' type='password' name='password_confirmation' id='password_confirmation'
                            required autocomplete="new-password" />
                        <label for='password'>{{ __('Confirme') }}</label>
                    </div>
                </div>
                <button type="submit" class="col s12 btn btn-large deep-orange">
                    {{ __('Enviar') }}
                </button>
            </form>
        </div>
    </div>
</div>
@endsection