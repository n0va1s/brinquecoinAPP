@extends('layout.site')

@section('titulo','Brinque Coin - Configuração de Quadros')

@section('conteudo')
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
                        <td><img height="60" width="60" src="{{ asset($registro->imagem) }}"
                                alt="{{ $registro->descricao }}" /></td>
                        <td>{{ $registro->descricao }}</td>
                        <td>
                            <a class="btn red darken-2"
                                href="{{ route('admin.configuracao.tiposquadros.editar',$registro->id) }}">Editar</a>
                            <a class="btn cyan darken-2"
                                href="{{ route('admin.configuracao.tiposquadros.deletar',$registro->id) }}">Deletar</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="row">
            <a class="btn orange darken-2" href="{{ route('admin.configuracao.tiposquadros.adicionar') }}">Adicionar</a>
        </div>
    </div>
</div>
@endsection
