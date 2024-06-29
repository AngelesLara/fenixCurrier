@extends('adminlte::page')

@section('title', 'ROLES-USUARIOS')

@section('content_header')
    <h1>LISTADO DE ROLES</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            {{ session('info') }}
        </div>
    @endif

    <div class="">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-body">
                    <a class="btn btn-primary float-right mr-4" href="{{ route('admin.roles.create') }}">Nuevo ROL</a>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>ROLE</th>
                                <th colspan="2"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $item)
                                <tr>
                                    <td>{{ $item->id }}</th>
                                    <td>{{ $item->name }}</th>
                                    <td width="10px">
                                        <a href="{{ route('admin.roles.edit', $item) }}"
                                            class="btn btn-sm btn-primary">Editar</a>
                                    </td>
                                    <td width="10px">
                                        <form action="{{ route('admin.roles.destroy', $item) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @stop
