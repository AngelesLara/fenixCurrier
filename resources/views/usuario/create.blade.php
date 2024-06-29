@extends('adminlte::page')

@section('title', 'Nuevo usuario')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-body">
                    <form method="POST" action="{{ route('usuarios.store') }}" role="form" autocomplete="off">
                        @csrf

                        @include('usuario.form')

                    </form>
                </div>
            </div>
        </div>
    </div>
@stop