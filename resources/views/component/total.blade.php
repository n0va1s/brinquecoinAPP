@if($type === 'Mesada')
<tr>
    <td>&nbsp;</td>
    <td>Resultado</td>
    <td class="center">{{ $monday }}</td>
    <td class="center">{{ $tuesday }}</td>
    <td class="center">{{ $wednesday }}</td>
    <td class="center">{{ $thursday }}</td>
    <td class="center">{{ $friday }}</td>
    <td class="center">{{ $saturday }}</td>
    <td class="center">{{ $sunday }}</td>
</tr>
@else
<tr>
    <td>&nbsp;</td>
    <td>Resultado</td>
    <td class="center"><i class="material-icons">{{ $monday }}</i></td>
    <td class="center"><i class="material-icons">{{ $tuesday }}</i></td>
    <td class="center"><i class="material-icons">{{ $wednesday }}</i></td>
    <td class="center"><i class="material-icons">{{ $thursday }}</i></i></td>
    <td class="center"><i class="material-icons">{{ $friday }}</i></td>
    <td class="center"><i class="material-icons">{{ $saturday }}</i></td>
    <td class="center"><i class="material-icons">{{ $sunday }}</i></td>
</tr>
@endif
