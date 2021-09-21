@extends('layout.app')

@section('titulo','Brinque Coin - Login')

@section('content')
<div class="container center-align">
    <div class="row">
        <div class="col l4 offset-l4">
            <h3>{{ __('Confirme a Senha') }}</h3>
            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf
                <div class='row'>
                    <div class='input-field col s12'>
                        <input type='password' name='password' id='password' required autocomplete="current-password" />
                        <label for='password'>{{ __('Senha') }}</label>
                    </div>
                    <div class='input-field col s12'>
                        <button type="submit" class="col s12 btn btn-large deep-orange">{{ __('Login') }}</button>
                        @if (Route::has('password.request'))
                        <a class="" href="{{ route('password.request') }}">
                            {{ __('Não consegue entrar?') }}
                        </a>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection