<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>@yield('titulo', 'Brinque Coin - as moedas do sucesso')</title>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Toastr -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">

    <!-- Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Handlee&display=swap" rel="stylesheet">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>
    <header class="header">
        <div class=" navbar-fixed">
            <nav>
                <div class="nav-wrapper red accent-2">
                    <a href="#!" class="brand-logo center"><img class="responsive-img" style="width: 80px;"
                            src="{{asset('img/brinquecoin.png')}}" /></a>
                    <a href="#" data-target="mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                    <ul class="left hide-on-med-and-down">
                        <li><a href="{{route('site.home')}}">Início</a></li>
                        @if(Auth::guest())
                        <li><a href="{{route('site.login')}}">Login</a></li>
                        @else
                        <li><a href="{{route('board.index')}}">Quadrinhos</a></li>
                        <li><a href="{{route('capsule.index')}}">Cápsula do tempo</a></li>
                        @endif
                    </ul>
                    @if(!Auth::guest())
                    <ul id="configuracoes" class="dropdown-content">
                        <li><a href="{{route('profile.edit',Auth::user()->id)}}">Meu Perfil</a></li>
                        <li><a href="{{ route('site.login.signout') }}">Sair</a></li>
                    </ul>
                    <ul class="right hide-on-med-and-down">
                        <li><a class="dropdown-trigger" href="{{route('board.index')}}" data-target="configuracoes">Olá,
                                {{ Auth::user()->name }}
                                <i class="material-icons right">arrow_drop_down</i></a></li>
                    </ul>
                    @endif
                </div>
            </nav>
        </div>
        <ul class="sidenav" id="mobile">
            <li><a href="{{route('site.home')}}">Início</a></li>
            @if(Auth::guest())
            <li><a href="{{route('site.login')}}">Login</a></li>
            @else
            <li><a href="{{route('board.index')}}">Quadrinhos</a></li>
            <li><a href="{{route('profile.edit',Auth::user()->id)}}">Meu Perfil</a></li>
            <li><a href="{{route('capsule.index')}}">Cápsula do tempo</a></li>
            <li><a href="{{ route('site.login.signout') }}">Sair</a></li>
            @endif
        </ul>
    </header>
    <main>
        <style>
            /*Fonte principal do site*/
            * {
                font-family: "Handlee", cursive, sans-serif;
            }

            /*Ocupar toda a altura da tela*/
            html {
                height: 100%;
            }

            /*Ocupar toda a altura da tela com o body, usando o flex, como uma coluna*/
            body {
                min-height: 100%;
                display: flex;
                flex-direction: column;
            }

            /*Conteudo prinpal com margem em relacao ao rodape*/
            main {
                flex: 1;
                margin-bottom: 30px;
            }

            /*Rodape fixo*/
            footer {
                position: fixed;
                bottom: 0;
                width: 100%;
            }

            nav {
                background-color: transparent;
            }
        </style>
