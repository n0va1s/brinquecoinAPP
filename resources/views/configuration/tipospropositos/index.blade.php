@extends('layout.app')

@section('titulo','Brinque Coin - Configuração de Propósitos')

@section('content')
<div class="container">
    <h3 class="center">Tipos de Propósitos</h3>
    <div class="container">
        <div class="row">
            <table>
                <thead>
                    <tr>
                        <th>Propósito (Letra)</th>
                        <th>Descrição</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($registros as $registro)
                    <tr>
                        <td>{{ $registro->proposito }}</td>
                        <td>{{ $registro->descricao }}</td>
                        <td>
                            <a class="btn red darken-2"
                                href="{{ route('admin.configuracao.tipospropositos.editar',$registro->id) }}">Editar</a>
                            <a class="btn cyan darken-2"
                                href="{{ route('admin.configuracao.tipospropositos.deletar',$registro->id) }}">Deletar</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="row">
            <a class="btn orange darken-2"
                href="{{ route('admin.configuracao.tipospropositos.adicionar') }}">Adicionar</a>
        </div>
    </div>
</div>
@endsection