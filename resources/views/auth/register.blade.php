@extends('layout.app')

@section('titulo','Brinque Coin - Login')

@section('content')
<div class="container center-align">
    <div class="row">
        <div class="col l4 offset-l4">
            <h3>{{ __('Cadastre-se') }}</h3>
            <form method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}
                <div class='row'>
                    <div class='input-field col s12'>
                        <input class='validate' type='text' name='name' id='name' value="{{ old('name') }}" required autocomplete="name" autofocus/>
                        <label for='name'>{{ __('Nome') }}</label>
                    </div>
                    <div class='input-field col s12'>
                        <input class='validate' type='email' name='email' id='email' value="{{ old('email') }}" required autocomplete="email" autofocus/>
                        <label for='email'>{{ __('E-Mail') }}</label>
                    </div>
                    <div class='input-field col s12'>
                        <input class='validate' type='password' name='password' id='password' required autocomplete="current-password"/>
                        <label for='password'>{{ __('Senha') }}</label>
                    </div>
                    <div class='input-field col s12'>
                        <input class='validate' type='password' name='password-confirm' id='password-confirm' required autocomplete="new-password"/>
                        <label for='password'>{{ __('Confirme') }}</label>
                    </div>
                    <div class="row">
                        <div class="">
                            <button type="submit" class="col s12 btn btn-large deep-orange">
                                {{ __('Salvar') }}
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection