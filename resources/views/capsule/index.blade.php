@extends('layout.app')

@section('titulo','Brinque Coin - Cápsula do Tempo')

@section('content')
<div class="container">
    <div class="fixed-action-btn">
        <a class="btn-floating btn-large red" href="{{route('capsule.create')}}">
            <i class=" large material-icons">add</i>
        </a>
    </div>
    <div class="row center">
        <h3 class="center">Suas cápsulas do tempo</h3>
    </div>
    <div class="row">
        @forelse ($data as $line)
        @php
            $numberOfImage = rand(1,10);
            $image = "img/moments/$numberOfImage.svg"
        @endphp
        <div class="col s12 m4">
            <div class="card">
                <div class="card-image">
                    <img src="{{ asset($image) }}" 
                        alt="Imagem ilustrativa da capsula do tempo"
                        height="150rem">
                </div>
                <div class="card-content">
                    <p>De: {{$line->from}}</p>
                    <br />
                    <p>Para: {{$line->to}}</p>
                    <br />
                    <p>Data: {{date('d/m/Y', strtotime($line->remember_at))}}</p>
                </div>
                <div class="grey lighten-3">
                    <div class="card-action center">
                        <a class="waves-light btn-small red darken-2"
                            href="{{route('capsule.destroy', $line->code)}}">Cancelar</a>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col s12 center">
            <img height="300em" 
            src="{{ asset('img/ilustrations/undraw_season_change_f99v.svg') }}" 
            alt="Imagem ilustrativa da capsula do tempo">
            <h5>Nenhuma cápsula por aqui...</h5>
        </div>
        @endforelse
    </div>
    <div class="row">
        {{ $data->links() }}
    </div>
</div>
@endsection