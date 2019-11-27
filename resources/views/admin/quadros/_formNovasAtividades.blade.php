<div class="input-field col s12 m4">
    <select name="tipo_proposito_id">
        <option value="" disabled selected>Propósito</option>
        @foreach ($tiposPropositos as $tipo)
        <option value="{{$tipo->id}}">{{$tipo->descricao}}</option>
        @endforeach
    </select>
</div>
<div class="input-field col s12 m8">
    <label>Atividade</label>
    <input type="text" name="descricao" value="{{isset($registro->descricao) ? $registro->descricao : ''}}">
</div>
<div class="file-field  input-field">
    <div class="btn-small cyan darken-2">
        <span>Imagem</span>
        <input type="file" name="imagem">
    </div>
    <div class="file-path-wrapper">
        <input class="file-path validate" type="text">
    </div>
</div>
