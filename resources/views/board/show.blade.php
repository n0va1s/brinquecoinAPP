@extends('layout.app')

@section('content')
<div class="container">
    <h3 class="center">Quadro de {{$boardVO['board']['type']}}</h3>
    <input type="hidden" id="code" value="{{$boardVO['board']['code']}}">
    <hr class="linha">
    <h5>{{$boardVO['person']['name']}}, seu objetivo <b>{{$boardVO['board']['goal']}}</b> está a caminho</h5>
    @if($boardVO['board']['type'] === 'Mesada')
    <h6>Você conseguiu 
        {{$boardVO['totals']['partial']}} de mesada até agora
    </h6>
    @else($boardVO['board']['type'] === 'Tarefa')
    <h6>Você conseguiu 
        {{$boardVO['totals']['partial']}} / {{$boardVO['totals']['total']}} ponto(s)
    </h6>
    @endif
    <div class="row">
        <table class="responsive-table hide-on-small-only">
            <thead>
                <tr>
                    <th>&nbsp;</th>
                    <th>Atividade</th>
                    @foreach ($boardVO['week'] as $day)
                    <th class="center">{{$day}}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($boardVO['activities'] as $activity)
                @component(
                'component/boardTable',
                [
                'propouse'=>$activity['propouse'],
                'icon'=>$activity['icon'],
                'name'=>$activity['name'],
                'id'=>$activity['id'],
                'monday'=>$activity['monday'],
                'tuesday'=>$activity['tuesday'],
                'wednesday'=>$activity['wednesday'],
                'thursday'=>$activity['thursday'],
                'friday'=>$activity['friday'],
                'saturday'=>$activity['saturday'],
                'sunday'=>$activity['sunday']
                ]
                )
                @endcomponent
                @endforeach
                @component(
                'component/total',
                [
                'type'=>$boardVO['board']['type'],
                'monday'=>$boardVO['totals']['monday'],
                'tuesday'=>$boardVO['totals']['tuesday'],
                'wednesday'=>$boardVO['totals']['wednesday'],
                'thursday'=>$boardVO['totals']['thursday'],
                'friday'=>$boardVO['totals']['friday'],
                'saturday'=>$boardVO['totals']['saturday'],
                'sunday'=>$boardVO['totals']['sunday']
                ]

                )
                @endcomponent
            </tbody>
        </table>
    </div>
    <div class="row hide-on-med-and-up">
        <ul class="collapsible">
            @foreach ($boardVO['week'] as $day => $name)
            <li>
                <div class="collapsible-header grey darken-3 white-text"><b>{{$name}}</b></div>
                <div class="collapsible-body">
                    <div class="row">
                        <div class="col s1">
                            <span>&nbsp;</span>
                        </div>
                        <div class="col s9">
                            <span><b>Atividade</b></span>
                        </div>
                        <div class="col s2">
                            <span><b>Situação</b></span>
                        </div>
                    </div>
                    @foreach ($boardVO['activities'] as $activity)
                    @component(
                    'component/boardAccordion',
                    [
                    'propouse'=>$activity['propouse'],
                    'icon'=>$activity['icon'],
                    'id'=>$activity['id'],
                    'name'=>$activity['name'],
                    'emoji'=>$activity[$day],
                    'day'=>$day
                    ]
                    )
                    @endcomponent
                    @endforeach
                </div>
            </li>
            @endforeach
        </ul>
    </div>
    <div class="row center">
        <div class="col s12">
            <button class="btn btn-large deep-orange" type="submit"
                onClick="window.location.reload()">Atualizar</button>
        </div>
    </div>
</div>
@endsection
<style>
    hr {
        border-top: 1px solid #8c8b8b;
        border-bottom: 1px solid #fff;
    }
</style>
