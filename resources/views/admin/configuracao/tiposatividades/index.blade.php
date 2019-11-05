@extends('layout.site')

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
                  <a class="btn deep-orange" href="{{ route('admin.configuracao.tiposatividades.editar',$registro->id) }}">Editar</a>
                  <a class="btn red" href="{{ route('admin.configuracao.tiposatividades.deletar',$registro->id) }}">Deletar</a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="row">
        <a class="btn blue" href="{{ route('admin.configuracao.tiposatividades.adicionar') }}">Adicionar</a>
      </div>
    </div>
  </div>
@endsection
