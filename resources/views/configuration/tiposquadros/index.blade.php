@extends('layout.app')

@section('titulo','Brinque Coin - Configuração de Quadros')

@section('content')
<div class="container">
    <h3 class="center">Tipos de Quadros</h3>
    <div class="container">
        <div class="row">
            <table>
                <thead>
                    <tr>
                        <th>Imagem</th>
                        <th>Descrição</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($registros as $registro)
                    <tr>
                        <td><img height="60" width="60" src="{{ asset($registro->image) }}"
                                alt="{{ $registro->name }}" /></td>
                        <td>{{ $registro->name }}</td>
                        <td>
                            <a class="btn red darken-2"
                                href="{{ route('board.type.edit',$registro->id) }}">Editar</a>
                            <a class="btn cyan darken-2"
                                href="{{ route('board.type.delete',$registro->id) }}">Deletar</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="row">
            <a class="btn orange darken-2" href="{{ route('board.type.create') }}">Adicionar</a>
        </div>
    </div>
</div>
@endsection