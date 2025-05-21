@extends('layouts.admin')

@section('title', 'Lista de categorias')

@section('content')
<div class="container">
    @if($message = Session::get('success'))
        <div class="alert alert-success">
            <span>{{$message}}</span>
        </div>
    @endif
    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <h1>Lista de categorias</h1>
    <a href="{{route('admin.categories.create')}}" class="btn btn-success">Crear categoria</a>
    <table class="table">
        <tr>
            <th>Id</th>
            <th colspan="2">Nombre</th>
        </tr>
    @foreach ($categories as $category)
        <tr>
            <td>{{$category->id}}</td>
            <td>{{$category->name}}</td>
            <td>
                <form action="{{route('admin.categories.destroy', $category->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('DELETE')
                    <div class="btn-group">
                        <a href="{{route('admin.categories.show', $category->id)}}" class="btn btn-primary">Mostrar</a>
                        <a href="{{route('admin.categories.edit', $category->id)}}" class="btn btn-warning">Editar</a>
                        {{-- <button type="submit" class="btn btn-danger">Eliminar categoria</button> --}}
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{$category->id}}">
                            Eliminar
                        </button>
                    </div>
                </form>
            </td>
        </tr>
        {{-- Modal --}}
        <div class="modal fade" id="exampleModal{{$category->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">¿Estas seguro/a?</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Estas a punto de eliminar "{{$category->name}}"
            </div>
            <div class="modal-footer">
                <form action="{{route('admin.categories.destroy', $category->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Eliminar categoria</button>
                </form>
            </div>
            </div>
        </div>
        </div>
    @endforeach
    </table>
    <div class="d-flex mt-3">
        {{$categories->links('pagination::bootstrap-5')}}
    </div>
    
</div>
@endsection