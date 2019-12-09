@extends('layout.site')

@section('titulo','Brinque Coin - Configuração de Atividades')

@section('conteudo')
<div class="container">
    <h3 class="center">Tipos de Atividades</h3>
    <div class="container">
        <div class="row">
            <table>
                <thead>
                    <tr>
                        <th>Tipo de Quadro</th>
                        <th>Tipo de Propósito</th>
                        <th>Descrição</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($registros as $registro)
                    <tr>
                        <td>{{ $registro->descricao }}</td>
                        <td>{{ $registro->descricao }}</td>
                        <td>{{ $registro->descricao }}</td>
                        <td>
                            <a class="btn red darken-2"
                                href="{{ route('admin.configuracao.tiposatividades.editar',$registro->id) }}">Editar</a>
                            <a class="btn cyan darken-2"
                                href="{{ route('admin.configuracao.tiposatividades.deletar',$registro->id) }}">Deletar</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="row">
            <a class="btn orange darken-2"
                href="{{ route('admin.configuracao.tiposatividades.adicionar') }}">Adicionar</a>
        </div>
    </div>
</div>
@endsection
