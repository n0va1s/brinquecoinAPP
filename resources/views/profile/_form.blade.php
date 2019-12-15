<div class='row'>
    <div class='input-field col s12'>
        <input class='validate' type='text' name='name' id='name' value="{{isset($user->name) ? $user->name : ''}}" />
        <label for='name'>Seu nome</label>
    </div>
</div>
<div class='row'>
    <div class='input-field col s12'>
        <input class='validate' type='email' name='email' id='email'
            value="{{isset($user->email) ? $user->email : ''}}" />
        <label for='email'>Seu email</label>
    </div>
</div>
<div class='row'>
    <div class='input-field col s12'>
        <input class='validate' type='password' name='password' id='password'
            value="{{isset($user->password) ? $user->password : ''}}" />
        <label for='password'>Sua senha</label>
    </div>
</div>
<br />
<center>
    <div class='row'>
        <button type='submit' name='btn_login' class='col s12 btn btn-large deep-orange'>Salvar</button>
    </div>
</center>
