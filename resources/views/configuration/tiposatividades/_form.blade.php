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

<div class="input-field col s12 m112">
    <input type="file" name="imagem" value="{{isset($registro->image) ? $registro->imagem : ''}}">
    <label>Imagem</label>
</div>
