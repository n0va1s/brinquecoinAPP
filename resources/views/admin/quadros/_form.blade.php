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
    <option value="M">O</option>
    <option value="F">A</option>
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

<div class="row">
  <div class="col s6 m2">
    <h5>Atividades</h5>
  </div>
  <div class="col s6 m2">
    <a class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">add</i></a>
  </div>
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