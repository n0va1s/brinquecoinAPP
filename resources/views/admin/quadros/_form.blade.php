<div class="input-field col s12 m2">
  <select name="tipo_quadro_id">
    <option value="" disabled selected>Tipo</option>
    @foreach($tiposQuadros as $tipo)
      <option value="{{ $tipo->id }}">{{ $tipo->descricao }}</option>
    @endforeach
  </select>
</div>
<div class="input-field col s12 m1">
  <select>
    <option value="" disabled selected>Para</option>
    <option value="M">o</option>
    <option value="F">a</option>
  </select>
</div>
<div class="input-field col s12 m8">
  <label>Nome</label>
  <input type="text" name="crianca" value="{{isset($registro->crianca) ? $registro->crianca : ''}}">
</div>
<div class="input-field col s12 m1">
  <label>Idade</label>
  <input type="number" name="idade" value="{{isset($registro->idade) ? $registro->idade : ''}}">
</div>
<div class="input-field col s12 m12">
  <label>Recompensa</label>
  <input type="text" name="recompensa" value="{{isset($registro->recompensa) ? $registro->recompensa : ''}}">
</div>
<div class="row">
  <h5>Atividades</h5>
</div>  
<div class="input-field">
  @foreach($tiposAtividades as $tipo)
  <div class="col s12 m4">
    <div class="row">
      <label class="inline">
        <input type="checkbox" id="{{ $tipo->id }}" name="tipo_atividade_id"/>
        <span>{{ $tipo->descricao }}</span>
      </label>
    </div>
  </div>
  @endforeach
</div>
