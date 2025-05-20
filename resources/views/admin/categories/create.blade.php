@extends('layouts.admin')

@section('title', 'Crear categoria')

@section('content')
    <div class="container">
        <form action="{{ route('admin.categories.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name" class="form-label">Nombre:</label>
                <input type="text" name="name" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Crear categoria</button>
        </form>
    </div>
@endsection
