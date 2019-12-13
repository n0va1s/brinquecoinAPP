@extends('layout.site')

@section('conteudo')
<div class="container">
    <h3 class="center">Quadro de {{ $boardAllowance['board']['type'] }}</h3>
    <hr class="linha">
    @component(
    'component/subtitle',
    [
    'name'=>$boardAllowance['person']['name'],
    'message'=>' você conseguiu',
    'result'=>null,
    'total'=>$boardAllowance['totals']['money'],
    'unit'=>'de mesada até agora'
    ]
    )
    @endcomponent
    
    <div class="row">
        <table class="responsive-table hide-on-med-and-down">
            <thead>
                <tr>
                    <th>&nbsp;</th>
                    <th>Atividade</th>
                    @foreach ($boardAllowance['week'] as $day)
                    <th class="center">{{$day}}</th>                        
                    @endforeach                    
                </tr>
            </thead>
            <tbody>
                @foreach ($boardAllowance['activities'] as $activity)
                @component(
                'component/boardTable',
                [
                'propouse'=>$activity['propouse'],
                'icon'=>$activity['icon'],
                'name'=>$activity['name'],
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
                @component('component/total', $boardAllowance['totals'])@endcomponent
            </tbody>
        </table>
    </div>
    <div class="row hide-on-med-and-up">
        <ul class="collapsible">
            @foreach ($boardAllowance['week'] as $day => $name)
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
                    @foreach ($boardAllowance['activities'] as $activity)
                    @component(
                    'component/boardAccordion',
                    [
                    'propouse'=>$activity['propouse'],
                    'icon'=>$activity['icon'],
                    'name'=>$activity['name'],
                    'day'=>$activity[$day]
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
