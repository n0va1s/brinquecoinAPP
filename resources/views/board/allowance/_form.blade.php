<div class="input-field col s12 m2">
    <select name="board_type_id">
        <option value="" disabled selected>Tipo</option>
        @foreach($board_types as $type)
        <option value="{{ $type->id }}" {{
            (isset($board->board_type_id) && ($board->board_type_id === $type->id))
            ? 'selected' : ''}}>{{ $type->name }}</option>
        @endforeach
    </select>
</div>
<div class="input-field col s12 m1">
    <select name="gender">
        <option value="" disabled selected>Para</option>
        <option value="M" {{isset($board->gender) && ($board->gender === 'M')
        ? 'selected' : ''}}>o</option>
        <option value="F" {{isset($board->gender) && ($board->gender === 'F')
        ? 'selected' : ''}}>a</option>
    </select>
</div>
<div class="input-field col s12 m8">
    <label>Nome</label>
    <input type="text" name="name" value="{{isset($board->name) ? $board->name : ''}}">
</div>
<div class="input-field col s12 m1">
    <label>Idade</label>
    <input type="number" name="age" value="{{isset($board->age) ? $board->age : ''}}">
</div>
