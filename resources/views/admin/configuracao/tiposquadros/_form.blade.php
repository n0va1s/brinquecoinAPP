<div class="input-field">
  <label>Descrição</label>
  <input type="text" name="descricao" value="{{ isset($registro->descricao) ? $registro->descricao : ''}}">  
</div>

<div class="file-field  input-field">
  <div class="btn blue">
    <span>Imagem</span>
    <input type="file" name="imagem">
  </div>
  
  <div class="file-path-wrapper">
    <input class="file-path validate" type="text">
  </div>
</div>
