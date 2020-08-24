@component('mail::message')
<img width="100em" height="100em" src="{{ $image }}">
<br />
Olá <b>{{ $name }}</b>,<br />
Continue avançando com o quadro de {{ $type }}!<br />
Não deixe pra cuidar dos seus filhos e de vc depois.
@component('mail::button', ['url' => $link])
Abrir quadro agora
@endcomponent
<br />
Um abraço,<br />
<b>Time {{ config('app.name') }}</b>
Caso vc não queira mais receber este lembrete, por favor
acesse app.brinquecoin.com e na lista dos seus quadros 
selecione a opção "Fechar Quadro"
@endcomponent
