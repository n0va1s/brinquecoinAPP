<div class="input-field col s12 m9">
    <label>Nome</label>
    <input type="text" name="name" value="{{isset($board->name) ? $board->name : ''}}">
</div>
<div class="input-field col s12 m1">
    <label>Idade</label>
    <input type="number" name="age" min="3" value="{{isset($board->age) ? $board->age : ''}}">
</div>
<div class="input-field col s12 m2">
    <select name="gender">
        <option value="" disabled selected>Gênero</option>
        <option value="M" {{isset($board->gender) && ($board->gender === 'M')
        ? 'selected' : ''}}>Masculino</option>
        <option value="F" {{isset($board->gender) && ($board->gender === 'F')
        ? 'selected' : ''}}>Feminino</option>
    </select>
</div>
