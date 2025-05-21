@extends('layouts.admin')

@section('title', 'Lista de usuarios')

@section('content')
<div class="container">
    @if($message = Session::get('success'))
        <div class="alert alert-success">
            <span>{{$message}}</span>
        </div>
    @endif
    <h1>Lista de usuarios</h1>
    <table class="table">
        <tr>
            <th>Id</th>
            <th>Nombre de usuario</th>
            <th>Email</th>
            <th>Fecha de nacimiento</th>
            <th>Acciones</th>
        </tr>
    @foreach ($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->birthday_date}}</td>
            <td>
                <form action="{{route('admin.users.destroy', $user->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('DELETE')
                    <div class="btn-group">
                        <a href="{{route('admin.users.show', $user->id)}}" class="btn btn-primary">Mostrar</a>
                        <a href="{{route('admin.users.edit', $user->id)}}" class="btn btn-warning">Editar</a>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{$user->id}}">
                            Eliminar
                        </button>
                    </div>
                </form>
            </td>
        </tr>
        {{-- Modal --}}
        <div class="modal fade" id="exampleModal{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">¿Estas seguro/a?</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Estas a punto de eliminar al usuario "{{$user->name}}"
            </div>
            <div class="modal-footer">
                <form action="{{route('admin.categories.destroy', $user->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Eliminar usuario</button>
                </form>
            </div>
            </div>
        </div>
        </div>  
    @endforeach
    </table>
    <div class="d-flex mt-3">
        {{$users->links('pagination::bootstrap-5')}}
    </div>
</div>
@endsection