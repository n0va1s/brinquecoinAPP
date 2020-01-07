@component('mail::message')
<img width="100em" height="100em" src="{{ $image }}">
<br />
Olá <b>{{ $name }}</b>,<br />
Sua cápsula do tempo foi criada!<br />
Você receberá uma mensagem na data combinada! ;)

Até lá,<br />
<b>Time {{ config('app.name') }}</b>
@endcomponent