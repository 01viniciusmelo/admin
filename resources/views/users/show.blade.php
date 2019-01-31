@extends('layouts.app')

@section('content')

    <a href="/users" class="btn btn-primary btn-md">
        Usuarios
    </a>

    <hr>

    <div class="row">

        @if (! empty($user->avatar))
       <div class="col-md-4 pull-left">

           <div class="card" style="width: 18rem;">
               <img src="{{ 'http://localhost:3000/' . $user->avatar }}" class="img-fluid">
           </div>

       </div>
        @endif

        <div class="col-md-8 pull-right">
            <table class="table table-bordered table-striped" width="100%">
                <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Correo Electronico</th>
                    <th scope="col">Rol</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role->display_name }}</td>
                </tr>
                </tbody>
            </table>
        </div>

    </div>

@endsection