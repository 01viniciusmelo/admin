@extends('layouts.app')

@section('content')

    <h3>Usuarios</h3>

    <users :users="{{ json_encode($users) }}"></users>

@endsection