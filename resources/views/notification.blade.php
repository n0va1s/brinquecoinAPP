@extends('layout.app')

@section('titulo','Brinque Coin - Mensagens')

@section('content')
<div class="container">
    <h3 class="center">Mensagens para vc {{ Auth::user()->name }}</h3>
    <div class="row">
        <div id="col s12 m8 offset-m2">
            <ul class="collection">
                @forelse (Auth::user()->unreadNotifications as $notification)
                <li class="collection-item avatar">
                    <h6 class="blue-text darken-2">
                        <i class="material-icons circle red accent-2">mail</i>
                        <span class="new badge">1</span><b>{{ $notification->data['title'] }}</b>
                    </h6>
                    <!--<span class="title"><b>{{ $notification->data['title'] }}</b></span>-->
                    <p>{{date('d/m/Y', strtotime($notification->data['date']))}}</p>
                </li>
                {{ $notification->markAsRead() }}
                @empty
                <div class="center">
                    <img src="{{ asset('img/carta.png') }}" alt="Imagem ilustrativa de uma carta">
                    <h5>Tudo certo! Vc já viu todas</h5>
                </div>
                @endforelse
            </ul>
        </div>
    </div>
</div>
@endsection
