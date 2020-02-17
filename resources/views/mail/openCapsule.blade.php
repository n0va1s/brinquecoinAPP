@component('mail::message')
<img width="100em" height="100em" src="{{ $image }}">
<br />
Olá {{ $to }},<br />
Em {{ $created_at }}, {{ $from }} criou essa cápsula do tempo para vc abrir hoje. <br />

Esta foi a menssagem:<br />
{{ $message }}<br />

Que os sonhos e objetivos desta menssagem lhe tragam muitas alegrias!<br />
<b>Time {{ config('app.name') }}</b>
@endcomponent