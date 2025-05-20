@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-4">
                <img class="w-100" src="{{ $book->image }}" alt="{{ $book->title }}">
            </div>
            <div class="col-8">
                <h1>{{ $book->title }}</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th colspan="2">Información del libro</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <tr>
                            <th>ID</th>
                            <td>{{$book->id}}</td>
                        </tr>
                        <tr>
                            <th>Autor</th>
                            <td>{{ $book->author }}</td>
                        </tr>
                        <tr>
                            <th>Categoria</th>
                            <td>{{$book->category->name}}</td>
                        </tr>
                        <tr>
                            <th>Fecha de publicación</th>
                            <td>{{ $book->publication_date }}</td>
                        </tr>
                        <tr>
                            <th>Precio</th>
                            <td>{{ $book->price }} &euro;</td>
                        </tr>
                        <tr>
                            <th>Edad minima recomendada</th>
                            <td>{{ $book->minimal_age }}</td>
                        </tr>
                        <tr>
                            <th>Puntuación de los usuarios media:</th>
                            <td>{{ number_format($bookValuation, 2) }}</td>
                        </tr>
                        <tr>
                            <th>Fecha de creación</th>
                            <td>{{$book->created_at}} </td>
                        </tr>
                        <tr>
                            <th>Ultima modificación</th>
                            <td>{{$book->updated_at}}</td>
                        </tr>
                    </tbody>
                </table>
                <p>{{ $book->summary }}</p>
            </div>
            <form action="{{route('admin.books.destroy', $book->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('DELETE')
                    <a href="{{route('admin.books.edit', $book->id)}}" class="btn btn-warning">Editar libro</a>
                    <button class="btn btn-danger" type="submit">Eliminar libro</button>
            </form>
        </div>
    @endsection
