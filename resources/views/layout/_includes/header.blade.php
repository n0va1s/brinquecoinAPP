<!DOCTYPE html>
<html>
<head>
    <title>@yield('titulo', 'Brinque Coin - as moedas do sucesso')</title>
  <!--Import Google Icon Font-->
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">

  <link href="https://fonts.googleapis.com/css?family=Handlee&display=swap" rel="stylesheet">

  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
<header class="header">
    <nav>
        <div class="nav-wrapper">
            <div class="container hide-on-med-and-down">
                <a href="/" class="brand-logo">Brinque Coin</a>
                <a href="#" data-activates="mobile" class="button-collapse"><i class="material-icons">menu</i></a>
                <ul class="right">
                    @if(Auth::guest())
                        <li><a href="{{route('site.login')}}">Login</a></li>
                    @else
                        <li><a href="{{route('admin.quadros')}}">Quadros</a></li>
                        <li><a href="#">{{Auth::user()->name}}</a></li>
                        <li><a href="{{ route('site.login.sair') }}">Sair</a></li>
                    @endif
                </ul>
            </div>
            <div class="container">
                <ul class="side-nav" id="mobile">
                    @if(Auth::guest())
                        <li><a href="{{route('site.login')}}">Login</a></li>
                    @else
                        <li><a href="{{route('admin.quadros')}}">Quadros</a></li>
                        <li><a href="#">{{Auth::user()->name}}</a></li>
                        <li><a href="{{ route('site.login.sair') }}">Sair</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>
<style>
    * {
        font-family: "Handlee", cursive, sans-serif;
    }
</style>
