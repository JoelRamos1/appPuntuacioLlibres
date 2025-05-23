@extends('layouts.guest')

@section('content')
<div class="container bg-white py-3">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>{{__(config('app.name'))}}</h1>
            <h2 class="h3">{{__('¿Que es ReadReview?')}}</h2>
            <p>{{__('ReadReview es una aplicación web que permite a los usuarios guardar puntuaciones y review de libros')}}</p>
            <p>{{__('Puedes iniciar sesión  en tu cuenta aqui: ')}}</p>
            <a href="/login" class="btn btn-success">Iniciar Sesión</a>
            <p>{{__('O registrarte en caso de que no tengas una cuenta')}}</p>
            <a href="/register" class="btn btn-primary">Registrarse</a>
        </div>
    </div>
</div>
@endsection