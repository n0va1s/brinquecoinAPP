<div class="input-field col s12 m4">
    <select name="propouse_type_id">
        <option value="" disabled selected>Propósito</option>
        @foreach ($propouse_types as $type)
        <option value="{{$type->id}}">{{$type->name}}</option>
        @endforeach
    </select>
</div>
<div class="input-field col s12 m8">
    <label>Atividade</label>
    <input type="text" name="name" value="{{isset($activity->name) ? $activity->name : ''}}">
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
    @foreach($activities_user as $activity)
    <div class="chip">
        <div class="col s2">
            <i class="material-icons">{{isset($activity->icon) ? $activity->icon : 'notifications_none'}}</i>
        </div>
        <div class="col s8">
            <span>{{$activity->name}}</span>
        </div>
        <div class="col s2">
            <a class="close material-icons" href="{{ route('board.activity.type.delete',$activity->id) }}">
                <i class="close material-icons">close</i>
            </a>
        </div>
    </div>
    @endforeach
</div>
