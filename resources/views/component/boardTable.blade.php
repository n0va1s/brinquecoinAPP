<tr>
    <td title="{{$propouse}}"><i class="material-icons">
            {{isset($icon) ? $icon : 'notifications_none'}}
        </i>
    </td>
    <td>{{$name}}</td>
    <td class="center">
        <img class="emoji" data-id="{{$id}}" data-day="monday" src="{{ asset($monday) }}"
            alt="emoji se a pessoa cumpriu ou não a atividade">
    </td>
    <td class="center">
        <img class="emoji" data-id="{{$id}}" data-day="tuesday" src="{{ asset($tuesday) }}"
            alt="emoji se a pessoa cumpriu ou não a atividade">
    </td>
    <td class="center">
        <img class="emoji" data-id="{{$id}}" data-day="wednesday" src="{{ asset($wednesday) }}"
            alt="emoji se a pessoa cumpriu ou não a atividade">
    </td>
    <td class="center">
        <img class="emoji" data-id="{{$id}}" data-day="thursday" src="{{ asset($thursday) }}"
            alt="emoji se a pessoa cumpriu ou não a atividade"></td>
    <td class="center">
        <img class="emoji" data-id="{{$id}}" data-day="friday" src="{{ asset($friday) }}"
            alt="emoji se a pessoa cumpriu ou não a atividade">
    </td>
    <td class="center">
        <img class="emoji" data-id="{{$id}}" data-day="saturday" src="{{ asset($saturday) }}"
            alt="emoji se a pessoa cumpriu ou não a atividade"></td>
    <td class="center">
        <img class="emoji" data-id="{{$id}}" data-day="sunday" src="{{ asset($sunday) }}"
            alt="emoji se a pessoa cumpriu ou não a atividade">
    </td>
</tr>
