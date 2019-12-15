@extends('layout.site')

@section('titulo','Brinque Coin - Perfil')

@section('conteudo')
<div class="section"></div>
<main>
    <center>
        <h3>Crie sua conta</h3>
        <div class="container">
            <div class="z-depth-1 grey lighten-4 row"
                style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">

                <form class="col s12" method="post" action="{{route('profile.store')}}">
                    {{ csrf_field() }}
                    @include('profile._form')
                </form>
            </div>
        </div>
    </center>
</main>
@endsection
