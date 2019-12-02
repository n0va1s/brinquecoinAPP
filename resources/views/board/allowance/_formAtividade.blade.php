<div class="input-field col s12 m8">
    <select name="tipo_atividade_id">
        <option value="" disabled selected>Atividade</option>
        @foreach($tiposAtividades as $tipo)
        <option value="{{ $tipo->id }}">{{ $tipo->des_proposito.' - '.$tipo->des_atividade }}</option>
        @endforeach
    </select>
</div>
<div class="input-field col s6 m3">
    <label>Valor</label>
    <input type="number" name="valor" value="{{isset($registro->valor) ? $registro->valor : ''}}">
</div>
<div class="col s6 m1">
    <button class="waves-light btn-small cyan darken-2" type="submit"><i class="material-icons prefix">add</i></button>
</div>
<div class="row">
    @foreach($activitiesBoard as $activity)
    <div class="chip col s6">
        <div class="col s1">
            <i class="material-icons">{{isset($activity->icone) ? $activity->icone : 'notifications_none'}}</i>
        </div>
        <div class="col s10">
            <span>{{$activity->descricao}}</span>
        </div>
        <div class="col s1">
            <a class="close material-icons" href="{{ route('activity.delete',$activity->id) }}">
                <i class="close material-icons">close</i>
            </a>
        </div>
    </div>
    @endforeach
</div>
