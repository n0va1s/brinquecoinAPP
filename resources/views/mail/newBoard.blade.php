@component('mail::message')
<center>
    <img width="100em" height="100em" src="{{$image}}">
    <br />
    Olá {{$name}},<br />
    Aqui está o seu novo quadro.<br />
    Clique no botão para abrir seu quadro:
</center>
@component('mail::button', ['url' => $link])
Abrir quadro
@endcomponent
<center>
    Um abraço,<br />
    Time {{ config('app.name') }}
</center>
@endcomponent
