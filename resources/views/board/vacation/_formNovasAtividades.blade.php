<div class="input-field col s12 m4">
    <select name="tipo_proposito_id">
        <option value="" disabled selected>Propósito</option>
        @foreach ($tiposPropositos as $tipo)
        <option value="{{$tipo->id}}">{{$tipo->descricao}}</option>
        @endforeach
    </select>
</div>
<div class="input-field col s12 m8">
    <label>Atividade</label>
    <input type="text" name="descricao" value="{{isset($registro->descricao) ? $registro->descricao : ''}}">
</div>
<div class="input-field file-field col s12 m12 ">
    <div class="btn-small cyan darken-2">
        <span>Imagem</span>
        <input type="file" name="imagem">
    </div>
    <div class="file-path-wrapper">
        <input class="file-path validate" type="text">
    </div>
</div>
<div class="row">
    @foreach($activitiesUser as $activity)
    <div class="chip">
        <div class="col s2 m2">
            <i class="material-icons">{{isset($activity->icone) ? $activity->icone : 'notifications_none'}}</i>
        </div>
        <div class="col s8 m8">
            <span>{{$activity->descricao}}</span>
        </div>
        <div class="col s2  m2">
            <a class="close material-icons" href="{{ route('activity.user.delete',$activity->id) }}">
                <i class="close material-icons">close</i>
            </a>
        </div>
    </div>
    @endforeach
</div>
