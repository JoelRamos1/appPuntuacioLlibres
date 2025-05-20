@extends('layouts.admin')

@section('title', 'Editar categoria')

@section('content')
    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="container">
        <form action="{{route('admin.categories.update', $category->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name" class="form-label">Nombre:</label>
                <input type="text" name="name" value="{{old('name', $category->name)}}" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Editar categoria</button>
        </form>
    </div>
@endsection