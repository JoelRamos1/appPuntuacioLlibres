@extends('layouts.app')

@section('title', 'Libros')

@section('content')
    <div class="container">
        <div class="row row-cols-sm-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 gy-4">
            @foreach ($books as $book)
            <div class="col">
                <div class="card">
                    <img src="{{$book['image']}}" class="card-img-top" alt="{{$book['title']}}">
                    <div class="card-body">
                        <div class="card-title fw-bold">{{$book['title']}}</div>
                        <p class="card-text text-truncate">{{$book['summary']}}</p>
                        <a href="{{url('/books/show/'.$book->id)}}" class="btn btn-primary stretched-link">Ver libro</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="d-flex mt-3">
        {{$books->links('pagination::bootstrap-5')}}
    </div>
    </div>
@endsection