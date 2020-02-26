@extends('layout.app')

@section('titulo','Brinque Coin - Início')

@section('content')
<div class="container">
    <h3 class="center">Nosso impacto</h3>
    <div class="row">
        <div id="card-stats">
            <div class="row center-align">
                <div class="col s12 m4 l4">
                    <div class="card animate fadeLeft">
                        <div class="card-content cyan white-text">
                            <p class="card-stats-title"><i class="material-icons">airplay</i> Quadros</p>
                            <h4 class="card-stats-number white-text">{{$result['board']}}</h4>
                            <p class="card-stats-compare">
                                <i class="material-icons">keyboard_arrow_up</i> criados
                                <span class="cyan text text-lighten-5">até o momento</span>
                            </p>
                        </div>
                        <div class="card-action cyan darken-1"></div>
                    </div>
                </div>
                <div class="col s12 m4 l4">
                    <div class="card animate fadeLeft">
                        <div class="card-content red accent-2 white-text">
                            <p class="card-stats-title"><i class="material-icons">person_outline</i>Famílias</p>
                            <h4 class="card-stats-number white-text">{{$result['parent']}}</h4>
                            <p class="card-stats-compare">
                                <i class="material-icons">keyboard_arrow_up</i> jogando
                                <span class="red-text text-lighten-5">regularmente</span>
                            </p>
                        </div>
                        <div class="card-action red"></div>
                    </div>
                </div>
                <div class="col s12 m4 l4">
                    <div class="card animate fadeRight">
                        <div class="card-content orange lighten-1 white-text">
                            <p class="card-stats-title"><i class="material-icons">hourglass_empty</i> Média de idade</p>
                            <h4 class="card-stats-number white-text">{{$result['age']}}</h4>
                            <p class="card-stats-compare">
                                <i class="material-icons">keyboard_arrow_up</i> não conta
                                <span class="orange-text text-lighten-5">quadro de hábito</span>
                            </p>
                        </div>
                        <div class="card-action orange"></div>
                    </div>
                </div>
                <div class="col s12 m4 l4">
                    <div class="card animate fadeRight">
                        <div class="card-content green lighten-1 white-text">
                            <p class="card-stats-title"><i class="material-icons">content_copy</i> Quadro mais usado</p>
                            <h4 class="card-stats-number white-text">{{$result['type']}}</h4>
                            <p class="card-stats-compare">
                                <i class="material-icons">keyboard_arrow_down</i> transformando
                                <span class="green-text text-lighten-5">o futuro</span>
                            </p>
                        </div>
                        <div class="card-action green"></div>
                    </div>
                </div>
                <div class="col s12 m4 l4">
                    <div class="card animate fadeLeft">
                        <div class="card-content purple white-text">
                            <p class="card-stats-title"><i class="material-icons">email</i> Cápsulas</p>
                            <h4 class="card-stats-number white-text">{{$result['capsuleCreated']}}</h4>
                            <p class="card-stats-compare">
                                <i class="material-icons">keyboard_arrow_up</i> criadas
                                <span class="purple text text-lighten-5">até o momento</span>
                            </p>
                        </div>
                        <div class="card-action purple darken-1"></div>
                    </div>
                </div>
                <div class="col s12 m4 l4">
                    <div class="card animate fadeLeft">
                        <div class="card-content brown white-text">
                            <p class="card-stats-title"><i class="material-icons">drafts</i> Cápsulas</p>
                            <h4 class="card-stats-number white-text">{{$result['capsuleSent']}}</h4>
                            <p class="card-stats-compare">
                                <i class="material-icons">keyboard_arrow_up</i> enviadas
                                <span class="brown text text-lighten-5">até o momento</span>
                            </p>
                        </div>
                        <div class="card-action brown darken-1"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
