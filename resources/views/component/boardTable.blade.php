<tr>
    <td title="{{$propouse}}"><i class="material-icons">
            {{isset($icon) ? $icon : 'notifications_none'}}
        </i>
    </td>
    <td>{{$name}}</td>
    <td class="center">
        <img src="{{ asset($monday) }}" alt="emoji representando se a pessoa cumpriu ou não a atividade"
            onclick="markActivity({{$id}},'monday')">
    </td>
    <td class="center">
        <img src="{{ asset($tuesday) }}" alt="emoji representando se a pessoa cumpriu ou não a atividade"
            onclick="markActivity({{$id}},'tuesday')">
    </td>
    <td class="center">
        <img src="{{ asset($wednesday) }}" alt="emoji representando se a pessoa cumpriu ou não a atividade"
            onclick="markActivity({{$id}},'wednesday')">
    </td>
    <td class="center">
        <img src="{{ asset($thursday) }}" alt="emoji representando se a pessoa cumpriu ou não a atividade"
            onclick="markActivity({{$id}},'thursday')"></td>
    <td class="center">
        <img src="{{ asset($friday) }}" alt="emoji representando se a pessoa cumpriu ou não a atividade"
            onclick="markActivity({{$id}},'friday')">
    </td>
    <td class="center">
        <img src="{{ asset($saturday) }}" alt="emoji representando se a pessoa cumpriu ou não a atividade"
            onclick="markActivity({{$id}},'saturday')"></td>
    <td class="center">
        <img src="{{ asset($sunday) }}" alt="emoji representando se a pessoa cumpriu ou não a atividade"
            onclick="markActivity({{$id}},'sunday')">
    </td>
</tr>
