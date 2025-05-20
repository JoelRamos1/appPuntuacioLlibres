@extends('layouts.admin')

@section('title', 'Ver categoria')

@section('content')
<div class="container">
    <h1>Categoria "{{$category->name}}"</h1>
    <table class="table">
        <thead>
            <th colspan="2">Información de categoria</th>
        </thead>
        <tbody class="table-group-divider">
            <tr>
                <th>Id</th>
                <td>{{$category->id}}</td>
            </tr>
            <tr>
                <th>Nombre</th>
                <td>{{$category->name}}</td>
            </tr>
            <tr>
                <th>Fecha de creación</th>
                <td>{{$category->created_at}}</td>
            </tr>
            <tr>
                <th>Fecha de modificación</th>
                <td>{{$category->updated_at}}</td>
            </tr>
        </tbody>
    </table>
    <form action="{{route('admin.categories.destroy', $category->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('DELETE')
        <a href="{{route('admin.categories.edit', $category->id)}}" class="btn btn-warning">Editar categoria</a>
        <button type="submit" class="btn btn-danger">Eliminar categoria</button>
    </form>
</div>
@endsection