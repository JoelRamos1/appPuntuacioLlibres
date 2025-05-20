@extends('layouts.admin')

@section('title', 'Editar usuario')

@section('content')
<div class="container">
    <form action="{{route('admin.users.update', $user->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name" class="form-label">Nombre de usuario:</label>
            <input type="text" name="name" value="{{old('name', $user->name)}}" class="form-control">
        </div>
        <div class="form-group">
            <label for="email" class="form-label">Email:</label>
            <input type="email" name="email" value="{{old('email', $user->email)}}" class="form-control">
        </div>
        <div class="form-group">
            <label for="birthday_date" class="form-label">Fecha de nacimiento:</label>
            <input type="date" name="birthday_date" value="{{old('birthday_date', $user->birthday_date)}}" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Editar usuario</button>
    </form>
</div>
@endsection