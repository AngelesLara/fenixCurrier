@extends('adminlte::page')

@section('title', 'ENCARGADOS-EDIT')

@section('content_header')
    <div class="card">
        <div class="card-body">
            <h1>PODRAS EDITAR LOS ENCARGADOS DE LOS CAMIONES</h1>

        </div>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.encargadotrucks.update', $encargadotrucks) }}" method="post">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="card-body">
                            <!-- Lista desplegable para seleccionar el empleado -->
                            <x-adminlte-select name="ID_Empleado" id="ID_Empleado" label="Seleccione el Empleado...">
                                @foreach ($empleadosDisponibles as $emp)
                                    <option value="{{ $emp->ID_Empleado }}"
                                        {{ $emp->ID_Empleado == optional($empleadoAsignado)->ID_Empleado ? 'selected' : '' }}>
                                        {{ $emp->empNombre }}
                                    </option>
                                @endforeach
                                @if ($empleadoAsignado)
                                    <option value="{{ $empleadoAsignado->ID_Empleado }}" selected>
                                        {{ $empleadoAsignado->empNombre }} (Asignado)
                                    </option>
                                @endif
                            </x-adminlte-select>
                            <!-- Lista desplegable para seleccionar el camión -->
                            <x-adminlte-select name="ID_Camion" id="ID_Camion" label="Seleccione el Transporte...">
                                @foreach ($trucksDisponibles as $tru)
                                    <option value="{{ $tru->ID_Camion }}"
                                        {{ $tru->ID_Camion == optional($camionAsignado)->ID_Camion ? 'selected' : '' }}>
                                        {{ $tru->truPlaca }}
                                    </option>
                                @endforeach
                                @if ($camionAsignado)
                                    <option value="{{ $camionAsignado->ID_Camion }}" selected>
                                        {{ $camionAsignado->truPlaca }} (Asignado)
                                    </option>
                                @endif
                            </x-adminlte-select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card-body">
                            <x-adminlte-input type="text" name="etDescripcion" id="etDescripcion" label="Descripción"
                                label-class="text-dark" value="{{ $encargadotrucks->etDescripcion }}">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text">
                                        <i class="far fa-fw fa-file-alt text-lightblue"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-input>
                        </div>
                    </div>
                </div>
                <x-adminlte-button type="submit" label="Modificar Empleado" theme="primary" icon="fas fa-save" />
            </form>
        </div>
    </div>
@stop
