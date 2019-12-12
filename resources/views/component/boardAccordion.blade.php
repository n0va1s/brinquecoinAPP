<div class="row">
    <div class="col s1">
        <span title="{{$propouse}}">
            <i class="material-icons">
                {{isset($icon) ? $icon : 'notifications_none'}}
            </i>
        </span>
    </div>
    <div class="col s9">
        <span>&nbsp;&nbsp;&nbsp;{{$name}}</span>
    </div>
    <div class="col s2">
        <img src="{{ asset('img/quadros/feito.png') }}">
    </div>
</div>
