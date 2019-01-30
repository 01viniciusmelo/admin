@extends('layouts.app')

@section('content')

    <a href="/users" class="btn btn-primary btn-md">
        Usuarios
    </a>

    <hr>

    <div class="row">

       <div class="col-md-6 pull-left">
           <div class="card" style="width: 18rem;">
               <img src="{{ 'http://localhost:3000/' . $user->avatar }}" class="img-fluid">
           </div>
       </div>

        <div class="col-md-6 pull-right">
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
        </div>

    </div>

@endsection