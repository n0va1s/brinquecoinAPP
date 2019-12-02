<div class="input-field col s12 m6">
  <label>De</label>
  <input type="text" name="nomeDe" value="{{isset($registro->nomeDe) ? $registro->nomeDe : ''}}">
</div>
<div class="input-field col s12 m6">
  <label>Para</label>
  <input type="text" name="nomePara" value="{{isset($registro->nomePara) ? $registro->nomePara : ''}}">
</div>
<div class="input-field col s12 m6">
  <label>Email</label>
  <input type="email" name="emailPara" value="{{isset($registro->emailPara) ? $registro->emailPara : ''}}">
</div>
<div class="input-field col s12 m6">
  <label>Abertura em</label>
  <input type="text" name="avisadoEm" class="datepicker" value="{{isset($registro->aberturaEm) ? $registro->aberturaEm : ''}}">
</div>
<div class="input-field col s12">
    <label for="mensagem">Mensagem</label>
    <textarea id="mensagem" name="mensagem" class="materialize-textarea">{{isset($registro->mensagem) ? $registro->mensagem : ''}}</textarea>    
</div>
