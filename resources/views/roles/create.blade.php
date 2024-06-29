@extends('adminlte::page')

@section('title', 'ROLES-USUARIO')

@section('content_header')
    <h1>CREAR UN ROL</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.roles.store']) !!}
            
            @include('roles.form')

            {!! Form::submit('Crear Rol', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
