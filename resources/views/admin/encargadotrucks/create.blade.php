@extends('adminlte::page')

@section('title', 'CAMIONES-CREATE')

@section('content_header')
    <div class="card">
        <div class="card-body">
            <h1>CREACIÓN DE DATOS DE LOS CAMIONES</h1>
        </div>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.encargadotrucks.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="card-body">
                            <x-adminlte-select name="ID_Empleado" id="ID_Empleado" label="Seleccione el Empleado...">
                                <option value="" selected disabled>Selecciona el empleado...</option>
                                @foreach ($empleados as $emp)
                                    <option value="{{ $emp->ID_Empleado }}">{{ $emp->empNombre }}</option>
                                @endforeach
                            </x-adminlte-select>
                            <x-adminlte-select name="ID_Camion" id="ID_Camion" label="Seleccione el Transporte...">
                                <option value="" selected disabled>Selecciona el camion...</option>
                                @foreach ($trucks as $tru)
                                    <option value="{{ $tru->ID_Camion }}">{{ $tru->truPlaca }}</option>
                                @endforeach
                            </x-adminlte-select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card-body">
                            <x-adminlte-input type="text" name="etDescripcion" id="etDescripcion" label="Descripción" placeholder="ingrese la descripción del encargado del camión..." label-class="text-dark" value="{{ old('') }}">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text">
                                        <i class="far fa-fw fa-file-alt text-lightblue"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-input>
                        </div>
                    </div>
                </div>
                <x-adminlte-button type="submit" label="Guardar" theme="primary" icon="fas fa-save mr-2" />
            </form>
        </div>
    </div>
@stop
