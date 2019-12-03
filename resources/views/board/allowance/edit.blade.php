@extends('layout.site')

@section('conteudo')
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
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="put">
                    @include('board.allowance._form')
                    <div class="row">
                        <button class="waves-light btn-small orange darken-2" type="submit"
                            name="action">Salvar</button>
                    </div>
                </form>
            </div>$
        </div>

        <div id="passo2" class="col s12">
            <div class="row">
                <h5>Escolha as atividades do quadro</h5>
            </div>
            <div class="row">
                <form action="{{route('activity.save')}}" method="post">
                    {{ csrf_field() }}
                    @include('board.allowance._formActivity')
                    <input type="hidden" name="codigo" value={{ $board->code }}>
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
                <form action="{{route('activity.user.save')}}" method="post">
                    {{ csrf_field() }}
                    @include('board.allowance._formNewActivities')
                    <input type="hidden" name="codigo" value={{ $board->codigo }}>
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
