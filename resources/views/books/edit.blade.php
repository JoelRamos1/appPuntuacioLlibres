@extends('layouts.app')

@section('title', 'Editar valoración')

@section('content')
<div class="container">
    @if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
    <h1>Editar valoración de "{{$book->title}}"</h1>
    <form action="{{url('/books/update/valuation/'.$book->id)}}" method="post">
        @csrf
        <label for="score" class="form-label">Puntuación:</label>
        <input type="number" name="score" value="{{$evaluation->score}}" class="form-control">
        <label for="valuation" class="form-label">Valoración:</label>
        <textarea class="form-control" name="valuation" cols="30" rows="10">{{$evaluation->valuation}}</textarea>
        <input class="btn btn-primary" type="submit" value="Editar">
    </form>
</div>
@endsection