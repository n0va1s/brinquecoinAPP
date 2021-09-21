<div class="input-field">
  <label>Descrição</label>
  <input type="text" name="name" value="{{ isset($data->name) ? $data->name : ''}}" required>  
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
  <img height="100em" width="100em" src="{{ isset($data->image) ? asset($data->image) : ''}}" alt="{{ isset($data->name) ? $data->name : ''}}" />
</div>
