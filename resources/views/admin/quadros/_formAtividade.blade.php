<div class="row">
    <h5>Escolha as atividades do quadro</h5>
</div>
<form action="{{route('admin.quadros.atividades.salvar')}}" method="post">
    <div class="input-field col s12 m8">
        <select name="tipo_quadro_id">
            <option value="" disabled selected>Atividade</option>
            @foreach($tiposAtividades as $tipo)
            <option value="{{ $tipo->id }}">{{ $tipo->descricao }}</option>
            @endforeach
        </select>
    </div>
    <div class="input-field col s6 m3">
        <label>Valor</label>
        <input type="number" name="valor" value="{{isset($registro->valor) ? $registro->valor : ''}}">
    </div>
    <div class="col s6 m1">
        <button class="waves-light btn-small cyan darken-2" type="submit"><i class="material-icons prefix">add</i></button>
    </div>
</form>
<div class="chip">
    <div class="col s1 m1">
        <i class="close material-icons">home</i>
    </div>
    <div class="col s6 m6">
        <span>Arrumar a cama</span>
    </div>
    <div class="col s1 m1">
        <i class="close material-icons">adjust</i>
    </div>
    <div class="col s2 m2">
        <span>0.4</span>
    </div>
    <div class="col s1  m1">
        <i class="close material-icons">mode_edit</i>
    </div>
    <div class="col s1  m1">
        <i class="close material-icons">close</i>
    </div>
</div>
<div class="chip">
    <div class="col s1 m1">
        <i class="close material-icons">favorite</i>
    </div>
    <div class="col s6 m6">
        <span>Escovar os dentes</span>
    </div>
    <div class="col s1 m1">
        <i class="close material-icons">adjust</i>
    </div>
    <div class="col s2 m2">
        <span>0.2</span>
    </div>
    <div class="col s1  m1">
        <i class="close material-icons">mode_edit</i>
    </div>
    <div class="col s1  m1">
        <i class="close material-icons">close</i>
    </div>
</div>
