<!DOCTYPE html>
<html>
    <head>
        <title>@yield('titulo', 'Brinque Coin - as moedas do sucesso')</title>
        <!--Import Google Icon Font-->
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

        <!-- Fonts-->
        <link href="https://fonts.googleapis.com/css?family=Handlee&display=swap" rel="stylesheet">

        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body>
    <header class="header">
        <nav>
            <div class="nav-wrapper">
            <a href="#!" class="brand-logo"><img class="responsive-img" style="width: 80px;" src="{{asset('img/brinquecoin.png')}}" /></a>
            <a href="#" data-target="mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
                @if(Auth::guest())
                    <li><a href="{{route('site.login')}}">Login</a></li>
                @else
                    <li><a href="{{route('admin.quadros')}}">Quadros</a></li>
                    <li><a href="#">{{Auth::user()->name}}</a></li>
                    <li><a href="{{ route('site.login.sair') }}">Sair</a></li>
                @endif
            </ul>
            </div>
        </nav>
        <ul class="sidenav" id="mobile">
            @if(Auth::guest())
                <li><a href="{{route('site.login')}}">Login</a></li>
            @else
                <li><a href="{{route('admin.quadros')}}">Quadros</a></li>
                <li><a href="#">{{Auth::user()->name}}</a></li>
                <li><a href="{{ route('site.login.sair') }}">Sair</a></li>
            @endif
        </ul>
    </header>
    <style>
        * {
            font-family: "Handlee", cursive, sans-serif;
        }
    </style>
