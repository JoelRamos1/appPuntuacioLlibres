@extends('layouts.guest')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Usuario</div>
                <div class="card-body text-center">
                    <a href="/login" class="btn btn-primary">Iniciar Sesión</a>
                    <a href="/register" class="btn btn-primary">Registrarse</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection