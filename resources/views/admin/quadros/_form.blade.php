<div class="input-field col s12 m2">
    <select name="tipo_quadro_id">
        <option value="" disabled selected>Tipo</option>
        @foreach($tiposQuadros as $tipo)
        <option value="{{ $tipo->id }}">{{ $tipo->descricao }}</option>
        @endforeach
    </select>
</div>
<div class="input-field col s12 m1">
    <select name="genero">
        <option value="" disabled selected>Para</option>
        <option value="M">o</option>
        <option value="F">a</option>
    </select>
</div>
<div class="input-field col s12 m8">
    <label>Nome</label>
    <input type="text" name="nome" value="{{isset($registro->nome) ? $registro->nome : ''}}">
</div>
<div class="input-field col s12 m1">
    <label>Idade</label>
    <input type="number" name="idade" value="{{isset($registro->idade) ? $registro->idade : ''}}">
</div>
<div class="input-field col s12 m12">
    <label>Recompensa</label>
    <input type="text" name="recompensa" value="{{isset($registro->recompensa) ? $registro->recompensa : ''}}">
</div>
