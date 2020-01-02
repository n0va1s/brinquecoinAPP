@component('mail::message')
<center>
    <img width="100em" height="100em" src="{{$image}}">
    <br />
    Olá {{$name}},<br />
    Sua cápsula do tempo foi criada!<br />
    Você receberá uma mensagem na data de abertura que indicou.

    Até lá,<br />
    Time {{ config('app.name') }}
</center>
@endcomponent
