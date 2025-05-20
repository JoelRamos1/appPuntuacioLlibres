@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col"><img class="w-100" src="{{$book->image}}" alt="{{$book->title}}"></div>
            <div class="col">
                <h1>{{$book->title}}</h1>
                <table class="table">
                    <thead>
                        <tr>
                        <th colspan="2">Información del libro</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <tr>
                        <th>Autor</th>
                        <td>{{$book->author}}</td>
                        </tr>
                        <tr>
                            <th>Fecha de publicación</th>
                            <td>{{$book->publication_date}}</td>
                        </tr>
                        <tr>
                            <th>Precio</th>
                            <td>{{$book->price}} &euro;</td>
                        </tr>
                        <tr>
                            <th>Edad minima recomendada</th>
                            <td>{{$book->minimal_age}}</td>
                        </tr>
                        <tr>
                            <th>Puntuación de los usuarios media:</th>
                            <td>NaN</td>
                        </tr>
                    </tbody>
                </table>
                <p>{{$book->summary}}</p>
            </div>
            <div class="col">
                <form action="{{url('/books/valuate/'.$id)}}" method="post">
                    @csrf
                    <label class="form-label"  for="score">Evaluar: </label>
                    <input class="form-control" type="number" name="score" min="0" max="10">
                    <label class="form-label" for="valuation">Opinión/Valoracion: </label>
                    <textarea class="form-control" name="valuation" id="" cols="30" rows="10"></textarea>
                    <input class="btn btn-primary" type="submit" value="Evaluar">
                </form>
            </div>
        </div>
    </div>
@endsection