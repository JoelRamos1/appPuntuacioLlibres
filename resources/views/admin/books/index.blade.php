@extends('layouts.admin')

@section('title', 'Lista de libros')

@section('content')
<div class="container">
    @if($message = Session::get('success'))
        <div class="alert alert-success">
            <span>{{$message}}</span>
        </div>
    @endif
    <h1>Lista de libros</h1>
    <a href="{{route('admin.books.create')}}" class="btn btn-success">Crear libro</a>
    <table class="table">
            <tr>
                <th>Id</th>
                <th>Titulo</th>
                <th>Autor</th>
                <th>Categoria</th>
                <th>Resumen</th>
                <th>Fecha de publicación</th>
                <th>Precio</th>
                <th>Imagen</th>
                <th>Edad minima</th>
                <th>Acciones</th>
            </tr>
        
    @foreach ($books as $book)
        <tr>
            <td>{{$book->id}}</td>
            <td>{{$book->title}}</td>
            <td>{{$book->author}}</td>
            <td>{{$book->category ? $book->category->name : "Sin categoria"}}</td>
            <td>{{$book->summary}}</td>
            <td>{{$book->publication_date}}</td>
            <td>{{$book->price}}</td>
            <td>{{$book->image}}</td>
            <td>{{$book->minimal_age}}</td>
            <td>
                <form action="{{route('admin.books.destroy', $book->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('DELETE')
                    <div class="btn-group">
                      <a href="{{route('admin.books.show', $book->id)}}" class="btn btn-primary">Mostrar en detalle</a>
                      <a href="{{route('admin.books.edit', $book->id)}}" class="btn btn-warning">Editar libro</a>
                      <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{$book->id}}">
                          Eliminar libro
                      </button>
                    </div>
                </form>
            </td>
        </tr>
        {{-- Modal --}}
<div class="modal fade" id="exampleModal{{$book->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">¿Estas seguro/a?</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Estas a punto de eliminar a "{{$book->title}}"
      </div>
      <div class="modal-footer">
        <form action="{{route('admin.books.destroy', $book->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('DELETE')
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-danger">Eliminar libro</button>
        </form>
      </div>
    </div>
  </div>
</div>
    @endforeach
    </table>
    <div class="d-flex mt-3">
        {{$books->links('pagination::bootstrap-5')}}
    </div>
    
</div>
@endsection