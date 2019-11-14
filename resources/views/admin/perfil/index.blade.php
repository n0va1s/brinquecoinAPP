@extends('layout.site')

@section('conteudo')
<div class="container">
    <h3 class="center">Seus dados</h3>
    <div class="row">
        <form action="{{route('admin.perfil.atualizar',$registro->id)}}" method="post"">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="put">
            <div class="input-field col s12 m12">
                <label>Nome</label>
                <input type="text" name="name" value="{{isset($registro->name) ? $registro->name : ''}}">
            </div>

            <div class="input-field col s12 m6">
                <label>E-mail</label>
                <input type="email" name="email" class="validate" value="{{isset($registro->email) ? $registro->email : ''}}">
                <span class="helper-text" data-error="Email inválido" data-success="">alguem@email.com</span>
            </div>

            <div class="input-field col s12 m6">
                <label>Senha</label>
                <input type="password" name="password" class="validate" value="{{isset($registro->password) ? $registro->password : ''}}">
            </div>

            <div class="input-field col s12 m12">
                <button class="btn-small waves-effect waves-light orange darken-2" type="submit" name="action">Salvar</button>
            </div>

            @if ($errors->any())
                <div class="input-field col s12 red darken-2 white-text center">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session('success'))
                <div class="input-field col s12 green darken-2 white-text center">
                      <p>{{ session('success') }}</p>
                </div>
            @endif
        </form>
    </div>
</div>
@endsection
