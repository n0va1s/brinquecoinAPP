<div class="input-field">
  <select name="tipo_quadro_id'">
    <option value="" disabled selected>Tipo de Quadro</option>
    @foreach ($tiposQuadros as $tipo)
    <option value="{{ $tipo->id }}">{{ $tipo->descricao }}</option>
    @endforeach
  </select>  
</div>

<div class="input-field">
  <select name="tipo_proposito_id">
    <option value="" disabled selected>Propósito</option>
    @foreach ($tiposPropositos as $tipo)
    <option value="{{ $tipo->id }}">{{ $tipo->descricao }}</option>
    @endforeach
  </select>  
</div>

<div class="input-field">
  <input type="text" name="descricao" value="{{ isset($registro->descricao) ? $registro->descricao : ''}}">  
  <label>Descrição</label>
</div>

<div class="row">
  <div class="col s12">
    <div class="row">
      <div class="input-field col s12">
        <i class="material-icons prefix">textsms</i>
        <input type="text" id="autocomplete-input" class="autocomplete">
        <label for="autocomplete-input">Autocomplete</label>
      </div>
    </div>
  </div>
</div>
