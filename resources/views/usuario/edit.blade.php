@extends('adminlte::page')

@section('title', 'ROLES-USUARIO')

@section('content_header')
    <h1>ASIGNAR ROLES PARA EL USUARIO</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif


    <div class="">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-body">
                    <p class="h3">Nombre: </p>
                    <p class="form-control">{{ $user->name }}</p>


                    {!! Form::model($user, ['route' => ['admin.usuarios.update', $user], 'method' => 'put']) !!}
                    @foreach ($roles as $item)
                        <div>
                            <label>
                                {!! Form::checkbox('roles[]', $item->id, null, ['class' => 'mr-1']) !!}
                                {{ $item->name }}
                            </label>
                        </div>
                    @endforeach

                    {!! Form::submit('ASIGNAR ROL', ['class' => 'btn btn-primary mt-4']) !!}

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@stop
