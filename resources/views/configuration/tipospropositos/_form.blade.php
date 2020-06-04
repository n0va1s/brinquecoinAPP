<div class="input-field">
  <input type="text" name="propouse" value="{{ isset($registro->propouse) ? $registro->propouse : ''}}" required autofocus>
  <label>Propósito (Letra)</label>
</div>

<div class="input-field">
  <input type="text" name="name" value="{{ isset($registro->name) ? $registro->name : ''}}">
  <label>Descrição</label>
</div>
