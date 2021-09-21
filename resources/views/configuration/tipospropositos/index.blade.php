@extends('layout.app')

@section('titulo','Brinque Coin - Configuração de Propósitos')

@section('content')
<div class="container">
    <h3 class="center">Tipos de Propósitos</h3>
    <div class="container">
    <div class="row right">
            <a class="btn orange darken-2"
                href="{{ route('propouse.type.create') }}">Adicionar</a>
        </div>
        <div class="row">
            <table>
                <thead>
                    <tr>
                        <th>Propósito (Letra)</th>
                        <th>Descrição</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $line)
                    <tr>
                        <td>{{ $line->propouse }}</td>
                        <td>{{ $line->name }}</td>
                        <td>
                            <a class="btn cyan darken-2"
                                href="{{ route('propouse.type.edit',$line->id) }}">Editar</a>
                            <a class="btn red darken-2"
                                href="{{ route('propouse.type.delete',$line->id) }}">Deletar</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
