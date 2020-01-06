@extends('layout.app')

@section('titulo','Brinque Coin - Login')

@section('content')
<div class="container center-align">
    <div class="row">
        <div class="col s4 offset-s4">
            <h3>{{ __('Acesse') }}</h3>
            <form method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
                <div class='row'>
                    <div class='input-field col s12'>
                        <input type='email' name='email' id='email' value="{{ old('email') }}" required
                            autocomplete="email" autofocus />
                        <label for='email'>{{ __('E-Mail') }}</label>
                    </div>
                    <div class='input-field col s12'>
                        <input type='password' name='password' id='password' required autocomplete="current-password" />
                        <label for='password'>{{ __('Senha') }}</label>
                    </div>
                    <div class='col s6'>
                        <label for='remember'>
                            <input type='checkbox' class='filled-in' name='remember' id='remember'
                                {{ old('remember') ? 'checked' : '' }} />
                            <span>{{ __('Lembrar') }}</span>
                        </label>
                    </div>
                    <div class='col s6'>
                        <a href="{{ route('register') }}">
                            <span>{{ __('Criar uma conta') }}</span>
                        </a>
                    </div>
                    <div class='input-field col s12'>
                        <button type="submit" class="col s12 btn btn-large deep-orange">{{ __('Login') }}</button>
                        @if (Route::has('password.request'))
                        <a class="" href="{{ route('password.request') }}">
                            <span>{{ __('Não consegue entrar?') }}</span>
                        </a>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
