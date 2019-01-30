@extends('layouts.app')

@section('content')

    <div class="row">

        <a href="/users" class="btn btn-primary btn-md">
            Usuarios
        </a>

        <img src="..." class="img-thumbnail" alt="...">

    </div>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Correo Electronico</th>
            <th scope="col">Rol</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">{{ $user->name }}</th>
            <td>{{ $user->email }}</td>
            <td>{{ $user->role }}</td>
        </tr>
        </tbody>
    </table>

@endsection