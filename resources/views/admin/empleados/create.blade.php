@extends('adminlte::page')

@section('title', 'EMPLEADOS-CREATE')

@section('content_header')
    <div class="card">
        <div class="card-body">
            <h1>CREACIÓN DE EMPLEADOS</h1>
        </div>
    </div>
@stop

@section('content')

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.empleados.store') }}" method="post">
                @csrf
                {{-- With prepend slot --}}
                <x-adminlte-input type="text" name="empCodigo" label="Codigo" placeholder="ingrese el codigo..."
                    label-class="text-dark" value="{{ old('empCodigo') }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="far fa-fw fa-file-alt text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                <x-adminlte-input type="text" name="empNombre" label="Nombre" placeholder="ingrese el nombre..."
                    label-class="text-dark" value="{{ old('empNombre') }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="far fa-fw fa-file-alt text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                <x-adminlte-input type="text" name="empTelefono" label="Telefono" placeholder="ingrese el telefono..."
                    label-class="text-dark" value="{{ old('empTelefono') }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-fw fa-phone text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                <x-adminlte-input type="text" name="empEmail" label="Email" placeholder="ingrese el email..."
                    label-class="text-dark" value="{{ old('empEmail') }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-fw fa-at text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                <x-adminlte-input type="text" name="empDireccion" label="Direccion" placeholder="ingrese la dirección..."
                    label-class="text-dark" value="{{ old('empDireccion') }}" pattern="[a-zA-Z0-9\s\.,]+">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-fw fa-map-marked-alt text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                <x-adminlte-input type="text" name="empSueldo" label="Sueldo" placeholder="number" type="number"
                    igroup-size="lg">
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-hashtag"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                <x-adminlte-input type="text" name="empCargo" label="Cargo" placeholder="ingrese el cargo del empleado..."
                    label-class="text-dark" value="{{ old('empCargo') }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-fw fa-tape text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                {{-- With prepend slot, sm size, and label 
                <x-adminlte-textarea type="text" name="proDescripcion" label="Descripción" rows=5
                    label-class="text-warning" igroup-size="sm" placeholder="Insert description...">
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-lg fa-file-alt text-warning"></i>
                        </div>
                    </x-slot>
                    {{ old('proDescripcion') }}
                </x-adminlte-textarea> --}}
                {{-- With prepend slot, lg size, and label
                <x-adminlte-select name="proEstado" label="Estado" label-class="text-lightblue" igroup-size="lg">
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-gradient-info">
                            <i class="fas fa-car-side"></i>
                        </div>
                    </x-slot>
                    <option value="">SELECCIONE EL ESTADO DEL PRODUCTO</option>
                    <option value="activo">DISPONIBLE</option>
                    <option value="desactivo">NO DISPONIBLE</option>
                </x-adminlte-select> --}}
                {{-- With append slot, number type, and sm size
                <x-adminlte-input type="text" name="proPrecio" label="Precio" placeholder="number" type="number"
                    igroup-size="sm">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-hashtag"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input> --}}
                <x-adminlte-button type="submit" label="Guardar" theme="primary" icon="fas fa-save mr-2" />
            </form>
        </div>
    </div>
@stop