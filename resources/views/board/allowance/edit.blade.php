@extends('layout.app')

@section('content')
<div class="container">
    <h3 class="center">Quadro de Mesada</h3>
    <div class="row">
        <div class="col s12">
            <ul class="tabs">
                <li class="tab col s3"><a class="active" href="#passo1">Para quem é o quadro</a></li>
                <li class="tab col s3"><a href="#passo2">Escolha atividades</a></li>
                <li class="tab col s3"><a href="#passo3">Crie novas</a></li>
            </ul>
        </div>

        <div id="passo1" class="col s12">
            <div class="row">
                <h5>Identifique a criança ou o jovem</h5>
            </div>
            <div class="row">
                <form action="{{route('board.allowance.update',$board->code)}}" method="post">
                    @csrf
                    <input type="hidden" name="_method" value="put">
                    @include('board._includes._formPerson')
                    <!-- Tipo de Quadro -->
                    <input type="hidden" name="board_type_id" value="3">
                    <div class="row">
                        <button class="waves-light btn-small orange darken-2" type="submit"
                            name="action">Salvar</button>
                    </div>
                </form>
            </div>
        </div>

        <div id="passo2" class="col s12">
            <div class="row">
                <h5>Escolha as atividades do quadro</h5>
            </div>
            <div class="row">
                <form action="{{route('board.activity.save')}}" method="post">
                    @csrf
                    @include('board._includes._formActivity')
                    <input type="hidden" name="code" value={{ $board->code }}>
                    <div class="row">
                        <button class="waves-light btn-small orange darken-2" type="submit"
                            name="action">Salvar</button>
                    </div>
                </form>
            </div>
        </div>

        <div id="passo3" class="col s12">
            <div class="row">
                <div class="row">
                    <h5>Cadastre novas atividades para o quadro</h5>
                </div>
                <form action="{{route('board.activity.type.save')}}" method="post">
                    @csrf
                    @include('board._includes._formNewActivity')
                    <input type="hidden" name="code" value={{ $board->code }}>
                    <div class="row">
                        <button class="waves-light btn-small orange darken-2" type="submit"
                            name="action">Salvar</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection