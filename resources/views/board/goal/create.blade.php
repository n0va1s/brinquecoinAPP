@extends('layout.app')

@section('content')
<div class="container">
    <h3 class="center">Quadro de Meta</h3>
    <div class="row">
        <div class="col s12">
            <ul class="tabs">
                <li class="tab col s3"><a class="active" href="#passo1">Para quem é o quadro</a></li>
            </ul>
        </div>

        <div id="passo1" class="col s12">
            <div class="row">
                <h5>Identifique a criança ou o jovem</h5>
            </div>
            <div class="row">
                <form action="{{route('board.goal.save')}}" method="post">
                    {{ csrf_field() }}
                    @include('board._includes._formPerson')
                    <!-- Tipo de Quadro -->
                    <input type="hidden" name="board_type_id" value="1">
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