@extends('layouts.admin')

@section('title', 'Ver información de usuario "'.$user->name.'"')

@section('content')
<div class="container">
    <h1>Usuario "{{$user->name}}"</h1>
    <table class="table">
        <thead>
            <tr class="text-center">
                <th class="h5 fw-bold" colspan="2">Información del usuario</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <tr>
                <th>ID</th>
                <td> {{$user->id}} </td>
            </tr>
            <tr>
                <th>Nombre</th>
                <td>{{$user->name}}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{$user->email}}</td>
            </tr>
            <tr>
                <th>Email verificado el</th>
                <td>{{$user->email_verified_at ?? "No verificado"}}</td>
            </tr>
            <tr>
                <th>Fecha de nacimiento</th>
                <td>{{$user->birthday_date ?? "No tiene fecha de nacimiento"}}</td>
            </tr>
            <tr>
                <th>Fecha de creación</th>
                <td>{{$user->created_at}}</td>
            </tr>
            <tr>
                <th>Fecha de modificación</th>
                <td>{{$user->updated_at}}</td>
            </tr>
        </tbody>
    </table>
    <form action="{{route('admin.users.destroy', $user->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('DELETE')
        <a href="{{route('admin.users.edit', $user->id)}}" class="btn btn-warning">Editar usuario</a>
        <button type="submit" class="btn btn-danger">Eliminar usuario</button>
    </form>
</div>
@endsection