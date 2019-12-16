@extends('layout.app')

@section('content')
<div class="container">
    <h3 class="center">Cadastre sua cápsula do tempo</h3>
    <div class="row">
        <form action="{{route('admin.capsule.store')}}" method="post">
            {{ csrf_field() }}
            @include('capsule._form')
            <div class="row">
                <button class="waves-light btn-small orange darken-2" type="submit" name="action">Salvar</button>
            </div>
        </form>
    </div>
</div>
@endsection