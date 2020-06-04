<div class="input-field">
  <select name="propouse_type_id" autofocus>
    <option value="" disabled selected>Propósito</option>
    @foreach ($types as $option)
    <option value="{{ $option->id }}" 
    @if(isset($data) and ($option->id === $data->propouse_type_id)) selected @endif>{{ $option->name }}</option>
    @endforeach
  </select>
</div>

<div class="input-field">
  <input type="text" name="name" value="{{ isset($data->name) ? $data->name : ''}}" required>
  <label>Descrição</label>
</div>

<div class="input-field col s12 m112">
    <input type="file" name="image" value="{{isset($data->image) ? $data->image : ''}}">
    <label>Imagem</label>
</div>
