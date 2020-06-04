<div class="input-field">
  <label>Descrição</label>
  <input type="text" name="name" value="{{ isset($registro->name) ? $registro->name : ''}}" required>  
</div>
<div class="file-field  input-field">
  <div class="btn blue">
    <span>Imagem</span>
    <input type="file" name="image">
  </div>
  <div class="file-path-wrapper">
    <input class="file-path validate" type="text">
  </div>
</div>
<div class="row">
  <img height="100em" width="100em" src="{{ asset($registro->image) }}" alt="{{ $registro->name }}" />
</div>
