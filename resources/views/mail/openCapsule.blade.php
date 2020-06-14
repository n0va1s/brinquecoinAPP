@component('mail::message')
<img width="100em" height="100em" src="{{ $image }}">
<br />
Olá {{ $toName }},<br />
Em {{ date('d/m/Y', strtotime($createdAt)) }}, {{ $fromName }} criou essa cápsula do tempo para vc abrir hoje. <br />

Esta foi a menssagem:<br />
{{ $description }}<br />

Que os sonhos e objetivos desta menssagem lhe tragam muitas alegrias!<br />
<b>Time {{ config('app.name') }}</b>
@endcomponent