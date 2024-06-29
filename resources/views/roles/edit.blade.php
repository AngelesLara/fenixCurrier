@extends('adminlte::page')

@section('title', 'ROLES-USUARIO')

@section('content_header')
    <h1>EDITAR UN ROL</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            {{ session('info') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            {!! Form::model($roles, ['route' => ['admin.roles.update', $roles], 'method' => 'PUT']) !!}

            @include('roles.form')

            {!! Form::submit('Actualizar Rol', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop
