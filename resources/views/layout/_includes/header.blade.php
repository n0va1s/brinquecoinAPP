<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>@yield('titulo', 'Brinque Coin: Ajudando Famílias por Meio de Quadros de Incentivo')</title>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    @toastr_css

    <!-- Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Handlee&display=swap" rel="stylesheet">

    <!-- Manifest -->
    <link rel="manifest" href="/manifest.json">
    <meta charset=”UTF-8″>
    <meta http-equiv=”content-language” content=”{{ str_replace('_', '-', app()->getLocale()) }}” />
    <meta name=”robots” content=”nofollow” />
    <meta name="description" content="Acesse agora mesmo os quadros de incentivo (quadro de tarefas, quadro de mesada, quadro de hábito) , a cápsula do tempo e transforme a sua família para melhor">
    <meta name="keywords" content="Quadros de Incentivo, Quadro de Tarefas, Quadro de Mesada, Super Nanny, Supernanny, Super Nanny Brasil,  Supernanny Brasil, Criar Filhos, Papai Pop, Como Educar seus Filhos" />
    <meta name="author" content="João Paulo Novais" />
    <meta name="creator" content="Isabela Patrocínio" />
    <meta name="theme-color" content="#ff5252" />
    <meta name=”application-name” content=”Brinque Coin”>
    
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Brinque Coin: Ajudando Famílias por Meio de Quadros de Incentivo">
    <link rel="apple-touch-icon" href="/img/icons/app-icon-152-152.png">

    <meta property=”og:locale” content=”{{ str_replace('_', '-', app()->getLocale()) }}” />
    <meta property=”og:type” content=”website” />
    <meta property=”og:title” content=”Brinque Coin: Ajudando Famílias por Meio de Quadros de Incentivo” />
    <meta property=”og:description” content=”Acesse agora mesmo os quadros de incentivo (quadro de tarefas, quadro de mesada, quadro de hábito) , a cápsula do tempo e transforme a sua família para melhor”>
    <meta property=”og:site_name” content=”Brinque Coin”>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>
    <header class="header">
        <div class=" navbar-fixed">
            <nav>
                <div class="nav-wrapper red accent-2">
                    <a href="#!" class="brand-logo center"><img class="responsive-img" style="width: 80px;"
                            src="{{asset('img/brinquecoin.png')}}" alt="logo do Brinque Coin" /></a>
                    <a href="#" data-target="mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                    <a href="#" class="right" id="optInstall">
                        <i title="Acesse mais fácil" class="material-icons">get_app</i>
                    </a>
                    <ul class="left hide-on-med-and-down">
                        <li><a href="{{route('site.home')}}">Início</a></li>
                        @if(Auth::guest())
                        <li><a href="{{route('login')}}">Login</a></li>
                        @else
                        <li><a href="{{route('board.index')}}">Quadrinhos</a></li>
                        <li><a href="{{route('capsule.index')}}">Cápsula do tempo</a></li>
                            @if(Auth::user()->isRole('Admin'))
                            <li><a href="{{route('board.type.index')}}">Quadro</a></li>
                            <li><a href="{{route('activity.type.index')}}">Atividade</a></li>
                            <li><a href="{{route('propouse.type.index')}}">Propósito</a></li>
                            @endif
                        @endif                        
                    </ul>
                    @if(!Auth::guest())
                    <ul class="right hide-on-med-and-down">
                        <li>
                            <a href="{{route('notification.list')}}">
                                <i title="Mensagens pra vc" class="material-icons">notifications
                                <span class="badge blue">
                                {{ Auth::user()->unreadNotifications->count() }}
                                </span>
                                </i>
                            </a>
                        </li>
                        <!-- Dropdown Trigger -->
                        <li>
                            <span class="right">
                                <a class='dropdown-trigger' href='#' data-target='opcoes'>
                                    Olá, {{ Auth::user()->name }}
                                </a>
                            </span>                            
                        </li>
                        <!-- Dropdown Structure -->
                        <ul id='opcoes' class='dropdown-content'>
                            <li><a href="{{ route('user.confirm') }}">Cancelar</a></li>
                            <li class="divider" tabindex="-1"></li>
                            <li><a href="{{ route('logout') }}">Sair</a></li>
                        </ul>
                    </ul>
                    @endif
                </div>
            </nav>
        </div>
        <ul class="sidenav" id="mobile">
            <li><a href="{{route('site.home')}}">Início</a></li>
            @if(Auth::guest())
            <li><a href="{{route('login')}}">Login</a></li>
            @else
            <li><a href="{{route('board.index')}}">Quadrinhos</a></li>
            <li><a href="{{route('capsule.index')}}">Cápsula do tempo</a></li>
            <li>
                <a href="{{route('notification.list')}}">
                    <i title="Mensagens pra vc" class="material-icons">notifications</i>
                </a>
            </li>
            @if(Auth::user()->isRole('Admin'))
            <li><a href="{{route('board.type.index')}}">Quadro</a></li>
            <li><a href="{{route('activity.type.index')}}">Atividade</a></li>
            <li><a href="{{route('propouse.type.index')}}">Propósito</a></li>
            @endif
            <li>
                <a href="{{ route('logout') }}">
                    <i title="Sair" class="material-icons">exit_to_app</i>
                </a>
            </li>
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
