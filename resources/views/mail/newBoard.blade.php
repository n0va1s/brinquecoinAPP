@component('mail::message')
<img width="100em" height="100em" src="{{ $image }}">
<br />
Olá <b>{{ $name }}</b>,<br />
Aqui está o seu novo quadro de {{ $type }}.<br />
Clique no botão para abrir seu quadro:
@component('mail::button', ['url' => $link])
Abrir quadro
@endcomponent
Um abraço,<br />
<b>Time {{ config('app.name') }}</b>
@endcomponent