<div class="row">
  <div class="input-field col s2">
    <label>Tipo</label>
    <input type="text" name="type" value="{{ isset($data->type) ? $data->type : ''}}" required>  
  </div>
  <div class="input-field col s10">
    <label>Descrição</label>
    <input type="text" name="name" value="{{ isset($data->name) ? $data->name : ''}}" required>  
  </div>
</div>
<div class="row file-field  input-field">
  <div class="btn blue">
    <span>Imagem</span>
    <input type="file" name="image">    
  </div>
  <div class="file-path-wrapper">
    <input class="file-path validate" type="text">    
  </div>
  <div class="row">
     <img height="100em" width="100em" src="{{ isset($data->image) ? asset($data->image) : ''}}" alt="{{ isset($data->name) ? $data->name : ''}}" />
  </div>  
</div>
