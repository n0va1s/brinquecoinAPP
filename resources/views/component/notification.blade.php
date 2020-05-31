@if(!Auth::guest())
<ul id="notifications" class="dropdown-content">
    @foreach (Auth::user()->unreadNotifications as $notification)
    <li>
        <div class="row">
            <div class="col s12">
                <label>{{ $notification->data['title'] }}</label><br />
                <label>{{date('d/m/Y', strtotime($notification->data['date']))}}</label>
            </div>
        </div>
    </li>
    {{ $notification->markAsRead() }}
    @endforeach
</ul>
<ul class="right hide-on-med-and-down">
    <li>
        <a class="dropdown-trigger" data-target="notifications">
            <i title="Mensagens pra vc" class="material-icons">notifications</i></a>
        </a>
    </li>
</ul>
@endif