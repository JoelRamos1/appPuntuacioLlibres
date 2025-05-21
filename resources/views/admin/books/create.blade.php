@extends('layouts.admin')

@section('title', 'Crear libro')

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
    <h1>Crear libro</h1>
    <form action="{{route('admin.books.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title" class="form-label">Titulo</label>
            <input type="text" name="title" class="form-control">
        </div>
        
        <div class="form-group">
            <label for="author">Autor:</label>
            <input type="text" name="author" class="form-control">
        </div>
        
        <div class="form-group">
            <label for="category_id" class="form-label">Categoria</label>
            <select name="category_id" class="form-control">
                <option value="" selected></option>
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="summary" class="form-label">Resumen:</label>
            <textarea name="summary" cols="30" rows="10" class="form-control"></textarea>
        </div>
        
        <div class="form-group">
            <label for="publication_date" class="form-label">Fecha de publicación:</label>
            <input type="date" name="publication_date" value="{{old('publication_date')}}" class="form-control">
        </div>

        <div class="form-group">
            <label for="price" class="form-label">Precio:</label>
            <input type="number" name="price" min="0" max="9999" class="form-control">
        </div>

        <div class="form-group">
            <label for="image" class="form-label">Imagen:</label>
            <input type="text" name="image" class="form-control">
        </div>

        <div class="form-group">
            <label for="minimal_age" class="form-label">Edad minima recomendada:</label>
            <input type="number" name="minimal_age" class="form-control">
        </div>
        <input type="submit" value="Crear libro" class="btn btn-primary">
    </form>
</div>
@endsection