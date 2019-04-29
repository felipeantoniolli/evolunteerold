@extends('default.defaultLayout')

@section('content')
<div class="content">
    <form method="POST" action="/cadastro" class="text-center border border-light p-5">
        @csrf
        <p class="h4 mb-4">Cadastre-se</p>
        <div class="form-row mb-4">
            <div class="col">
                <label for="nome">Nome</label>
                <input type="text" class="form-control {{ $errors->has('nome')? 'is-invalid' : ''}}" name="nome" id="nome" placeholder="Insira seu Nome">
                @if($errors->has('nome'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nome') }}
                    </div>
                @endif
            </div>
            <div class="col">
                <label for="email">Email</label>
                <input type="email" class="form-control {{ $errors->has('email')? 'is-invalid' : ''}}" name="email" id="email" placeholder="Insira seu Email">
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
            </div>
        </div>
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
        <div class="form-row mb-4">
            <div class="col">
                <label for="cpf">CPF</label>
                <input type="text" class="form-control {{ $errors->has('cpf')? 'is-invalid' : ''}}" name="cpf" id="cpf" maxlength="11" placeholder="Insira seu CPF">
                @if($errors->has('cpf'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cpf') }}
                    </div>
                @endif
            </div>
            <div class="col">
                <label for="rg">RG</label>
                <input type="text" class="form-control" name="rg" id="rg" placeholder="Insira seu RG">
            </div>
            <div class="col">
                <label for="genero">Genero</label>
                <select class="form-control" name="genero" id="genero">
                    <option disable>Selecione um Genero</option>
                    <option value="1">Masculino</option>
                    <option value="2">Feminino</option>
                </select>
            </div>
            <div class="col">
                <label for="data_nasc">Data de nascimento</label>
                <input type="date" class="form-control {{ $errors->has('data_nasc')? 'is-invalid' : ''}}" id="data_nasc" name="data_nasc">
                @if($errors->has('data_nasc'))
                    <div class="invalid-feedback">
                        {{ $errors->first('data_nasc') }}
                    </div>
                @endif
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Cadastre-se</button>
    </form>
</div>
@endsection
