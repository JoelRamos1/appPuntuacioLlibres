@extends('layouts.app')

@section('title', $book->title)

@section('content')
    @php
        $valuation = $book->valuation()->where('user_id', auth()->id())->first();
    @endphp
    <div class="container">
        @if($message = Session::get('success'))
            <div class="alert alert-success">
                <span>{{$message}}</span>
            </div>
        @endif
        <div class="row row-cols-sm-1 row-cols-md-2 row-cols-lg-3 gy-3">
            <div class="col-5">
                <img class="w-100" src="{{$book->image}}" alt="{{$book->title}}">
            </div>
            <div class="col-5">
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
                            <th>Categoria</th>
                            <td>{{$bookCategory->name ?? "Sin categoria"}}</td>
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
                            <td>{{number_format($bookValuation, 2)}}</td>
                        </tr>
                    </tbody>
                </table>
                <p>{{$book->summary}}</p>
                
            </div>
            <div class="col-2">
                @if($valuation)
                    <div class="row">
                        <div class="col"><a href="{{url('/books/edit/valuation/'.$id)}}" class="btn btn-warning">Editar valoración</a></div>
                    </div>
                    <div class="row">
                        <div class="card">
                            <div class="card-header">
                                Valoracion hecha previamente
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Puntuación: {{$valuation->pivot->score}}</li>
                            </ul>
                            <div class="card-body">
                                {{$valuation->pivot->valuation}}
                            </div>
                            
                        </div>
                        <p></p>
                        <p></p>
                    </div>
                @else
                    <div class="row">
                        <div class="col w-100"><a href="{{url('/books/create/valuation/'.$id)}}" class="btn btn-primary">Evaluar</a></div>
                    </div>
                    
                @endif
            </div>
        </div>
    </div>
@endsection