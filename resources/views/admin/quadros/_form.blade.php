<div class="input-field col s12 m2">
  <select name="tipo_quadro_id">
    <option value="" disabled selected>Tipo</option>
    @foreach($tiposQuadros as $tipo)
      <option value="{{ $tipo->id }}">{{ $tipo->descricao }}</option>
    @endforeach
  </select>
</div>
<div class="input-field col s12 m1">
  <select name="genero">
    <option value="" disabled selected>Para</option>
    <option value="M">o</option>
    <option value="F">a</option>
  </select>
</div>
<div class="input-field col s12 m8">
  <label>Nome</label>
  <input type="text" name="nome" value="{{isset($registro->nome) ? $registro->nome : ''}}">
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
  <h5>Escolha as atividades do quadro</h5>
</div>
<div class="input-field col s12 m8">
    <i class="material-icons prefix">textsms</i>
    <input type="text" id="autocomplete-input" class="autocomplete">
    <label for="autocomplete-input">Digite uma atividade</label>
</div>
<div class="input-field col s12 m3">
  <label>Valor</label>
  <input type="text" name="recompensa" value="{{isset($registro->recompensa) ? $registro->recompensa : ''}}">
</div>
<div class="input-field col s12 m1">
    <button class="waves-light btn-small cyan darken-2" type="submit" name="adicionar" id="adicionar"><i class="material-icons prefix">add</i></button>
</div>
<div class="chip">
    <div class="col s1 m1">
        <i class="close material-icons">home</i>
    </div>
    <div class="col s6 m6">
        <span>Arrumar a cama</span>
    </div>
    <div class="col s1 m1">
        <i class="close material-icons">adjust</i>
    </div>
    <div class="col s2 m2">
        <span>0.4</span>
    </div>
    <div class="col s1  m1">
        <i class="close material-icons">mode_edit</i>
    </div>
    <div class="col s1  m1">
        <i class="close material-icons">close</i>
    </div>
</div>
<div class="chip">
    <div class="col s1 m1">
        <i class="close material-icons">favorite</i>
    </div>
    <div class="col s6 m6">
        <span>Escovar os dentes</span>
    </div>
    <div class="col s1 m1">
        <i class="close material-icons">adjust</i>
    </div>
    <div class="col s2 m2">
        <span>0.2</span>
    </div>
    <div class="col s1  m1">
        <i class="close material-icons">mode_edit</i>
    </div>
    <div class="col s1  m1">
        <i class="close material-icons">close</i>
    </div>
</div>
