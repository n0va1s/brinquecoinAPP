<div class="row">
    <div class="col s2">
        <span title="{{$propouse}}">
            <i class="material-icons">
                {{isset($icon) ? $icon : 'notifications_none'}}
            </i>
        </span>
    </div>
    <div class="col s7">
        <span>&nbsp;&nbsp;&nbsp;{{$name}}</span>
    </div>
    <div class="col s3">
        <img src="{{ asset($day) }}" data-id="{{$id}}" data-day="{{$day}}">
    </div>
</div>
