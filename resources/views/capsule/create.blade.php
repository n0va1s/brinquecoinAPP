@extends('layout.app')

@section('content')
<div class="container">
    <h3 class="center">Cadastre sua cápsula do tempo</h3>
    <div class="row">
        <form action="{{route('capsule.store')}}" method="post">
            {{ csrf_field() }}
            <div class="input-field col s12 m6">
                <label>De</label>
                <input type="text" name="from" value="{{isset($registro->from) ? $registro->from : ''}}">
            </div>
            <div class="input-field col s12 m6">
                <label>Para</label>
                <input type="text" name="to" value="{{isset($registro->to) ? $registro->to : ''}}">
            </div>
            <div class="input-field col s12 m6">
                <label>Email</label>
                <input type="email" name="email" value="{{isset($registro->email) ? $registro->email : ''}}">
            </div>
            <div class="input-field col s12 m6">
                <label>Abertura em</label>
                <input type="date" name="remember_at" value="{{isset($registro->remember_at) ? $registro->remember_at : ''}}">
            </div>
            <div class="input-field col s12">
                <label for="message">Mensagem</label>
                <textarea id="message" name="message" class="materialize-textarea">{{isset($registro->message) ? $registro->message : ''}}</textarea>    
            </div>              
            <div class="row">
                <button class="waves-light btn-small orange darken-2" type="submit" name="action">Salvar</button>
            </div>
        </form>
    </div>
</div>
@endsection