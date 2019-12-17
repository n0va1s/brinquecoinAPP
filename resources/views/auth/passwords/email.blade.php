@extends('layout.app')

@section('titulo','Brinque Coin - Login')

@section('content')
<div class="container center-align">
    <div class="row">
        <div class="col l4 offset-l4">
            <h3>{{ __('Nova senha') }}</h3>

            <form method="POST" action="{{ route('password.email') }}">
                {{ csrf_field() }}
                <div class='row'>
                    <div class='input-field col s12'>
                        <input type='email' name='email' id='email' value="{{ old('email') }}" required
                            autocomplete="email" autofocus />
                        <label for='email'>{{ __('E-Mail') }}</label>
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
