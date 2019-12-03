<div class="input-field col s12 m8">
    <select name="activity_type_id">
        <option value="" disabled selected>Atividade</option>
        @foreach($actitity_types as $type)
        <option value="{{ $type->id }}">{{ $type->propouse.' - '.$type->activity }}</option>
        @endforeach
    </select>
</div>
<div class="input-field col s6 m3">
    <label>Valor</label>
    <input type="number" name="value" value="{{isset($quadro->value) ? $quadro->value : ''}}">
</div>
<div class="col s6 m1">
    <button class="waves-light btn-small cyan darken-2" type="submit"><i class="material-icons prefix">add</i></button>
</div>
<div class="row">
    @foreach($activities_board as $activity)
    <div class="chip col s6">
        <div class="col s1">
            <i class="material-icons">{{isset($activity->icon) ? $activity->icon : 'notifications_none'}}</i>
        </div>
        <div class="col s10">
            <span>{{$activity->name}}</span>
        </div>
        <div class="col s1">
            <a class="close material-icons" href="{{ route('activity.delete',$activity->id) }}">
                <i class="close material-icons">close</i>
            </a>
        </div>
    </div>
    @endforeach
</div>
