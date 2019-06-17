@extends('default.defaultLayout')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-3">
            <a href="{{ route('site.login') }}">
                <button class="btn btn-default" style="height: 300px; width: 300px">Login</button>
            </a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('site.cadastro') }}">
                <button class="btn btn-default" style="height: 300px; width: 300px">Cadastre-se</button>
            </a>
        </div>
    </div>
</div>
@endsection
