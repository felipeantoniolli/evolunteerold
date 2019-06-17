@extends('default.defaultLayout')

@section('content')
<div class="content">
    <div class="success alert-success text-center" role="alert">
        Seja bem vindo, {{ $voluntario->nome }}.
    </div>
</div>
@endsection
