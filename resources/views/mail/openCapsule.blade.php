@component('mail::message')
<img width="100em" height="100em" src="{{ $imLogo }}">
<br />
Olá {{ $nmRecipient }},<br />
Em {{ date('d/m/Y', strtotime($dtCreatedAt)) }}, {{ $nmSender }} criou essa cápsula do tempo para vc abrir hoje. <br />

Esta foi a menssagem:<br />
{{ $txMessage }}<br />

Que os sonhos e objetivos desta menssagem lhe tragam muitas alegrias!<br />
<b>Time {{ config('app.name') }}</b>
@endcomponent