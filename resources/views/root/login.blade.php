@extends('default.defaultLayout')

@section('content')
<div class="content">
    <form method="POST" action="{{ route('site.signIn') }}" class="text-center border border-light p-5">
        @csrf
        <p class="h4 mb-4">Login</p>
        @if(isset($message))
        <div class="alert alert-danger" role="alert">
            {{ $message }}
        </div>
        @endif
        <div class="form-row mb-4">
            <div class="col">
                <label for="usuario">Usuário</label>
                <input type="text" class="form-control {{ $errors->has('usuario')? 'is-invalid' : ''}}" name="usuario" id="usuario" placeholder="Insira seu Usuário">
                @if($errors->has('usuario'))
                    <div class="invalid-feedback">
                        {{ $errors->first('usuario') }}
                    </div>
                @endif
            </div>
            <div class="col">
                <label for="senha">Senha</label>
                <input type="password" class="form-control {{ $errors->has('senha')? 'is-invalid' : ''}}" name="senha" id="senha" placeholder="Insira sua Senha">
                @if($errors->has('senha'))
                    <div class="invalid-feedback">
                        {{ $errors->first('senha') }}
                    </div>
                @endif
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Entrar</button>
    </form>
</div>
@endsection
