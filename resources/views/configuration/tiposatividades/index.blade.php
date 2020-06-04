@extends('layout.app')

@section('titulo','Brinque Coin - Configuração de Atividades')

@section('content')
<div class="container">
    <h3 class="center">Tipos de Atividades</h3>
    <div class="container">
        <div class="row">
            <table>
                <thead>
                    <tr>
                        <th>Tipo de Propósito</th>
                        <th>Descrição</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $line)
                    <tr>
                        <td>&nbsp;</td>
                        <td>{{ $line->name }}</td>
                        <td>
                            <a class="btn red darken-2"
                                href="{{ route('activity.type.edit',$line->id) }}">Editar</a>
                            <a class="btn cyan darken-2"
                                href="{{ route('activity.type.delete',$line->id) }}">Deletar</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="row">
            <a class="btn orange darken-2"
                href="{{ route('activity.type.create') }}">Adicionar</a>
        </div>
    </div>
</div>
@endsection