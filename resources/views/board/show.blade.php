@extends('layout.site')

@section('conteudo')
<div class="container">
    <h3 class="center">Quadro de {{ $board->name }}</h3>
    <hr class="linha">
    <h5>Você conseguiu {{ $result['money'] }} de mesada</h5>
    <div class="row">
        <table class="responsive-table hide-on-med-and-down">
            <thead>
                <tr>
                    <th>&nbsp;</th>
                    <th>Atividade</th>
                    @foreach ($week as $day)
                    <th class="center">{{$day}}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($activities as $activity)
                    @component(
                    'component/boardTable', 
                        [
                            'propouse'=>$activity->propouse,
                            'icon'=>$activity->icon,
                            'name'=>$activity->name
                        ]
                    )
                    @endcomponent
                @endforeach
                @component('component/total', $result)@endcomponent
            </tbody>
        </table>
    </div>
    <div class="row hide-on-med-and-up">
        <ul class="collapsible">
            @foreach ($week as $day)
            <li>
                <div class="collapsible-header grey darken-3 white-text"><b>{{$day}}</b></div>
                <div class="collapsible-body">
                    <div class="row">
                        <div class="col s9">
                            <span><b>Atividade</b></span>
                        </div>
                        <div class="col s3">
                            <span><b>Situação</b></span>
                        </div>
                    </div>
                    @foreach ($activities as $activity)
                        @component(
                        'component/boardAccordion', 
                            [
                                'propouse'=>$activity->propouse,
                                'icon'=>$activity->icon,
                                'name'=>$activity->name
                            ]
                        )
                        
                        @endcomponent
                    @endforeach
                </div>
            </li>
            @endforeach        
        </ul>
    </div>
</div>
@endsection
<style>
    hr {
        border-top: 1px solid #8c8b8b;
        border-bottom: 1px solid #fff;
    }
</style>
