@extends('adminlte::page')

@section('title', 'EMPLEADOS-CREATE')

@section('content_header')
    <div class="card">
        <div class="card-body">
            <h1>PODRAS EDITAR A: {{ $empleados->empNombre }}</h1>

        </div>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.empleados.update', $empleados) }}" method="post">
                @csrf
                @method('PUT')
                {{-- With prepend slot --}}
                <x-adminlte-input type="text" name="empCodigo" label="Codigo" label-class="text-dark"
                    value="{{ $empleados->empCodigo }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="far fa-fw fa-file-alt text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                <x-adminlte-input type="text" name="empNombre" label="Nombre" label-class="text-dark"
                    value="{{ $empleados->empNombre }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="far fa-fw fa-file-alt text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                <x-adminlte-input type="text" name="empTelefono" label="Telefono" label-class="text-dark"
                    value="{{ $empleados->empTelefono }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-fw fa-phone text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                <x-adminlte-input type="text" name="empEmail" label="Email" label-class="text-dark"
                    value="{{ $empleados->empEmail }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-fw fa-at text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                <x-adminlte-input type="text" name="empDireccion" label="Direccion" label-class="text-dark"
                    value="{{ $empleados->empDireccion }}" pattern="[a-zA-Z0-9\s\.,]+">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-fw fa-map-marked-alt text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                <x-adminlte-input type="number" name="empSueldo" label="Sueldo" label-class="text-dark"
                    value="{{ $empleados->empSueldo }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-hashtag"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                <x-adminlte-input type="text" name="empCargo" label="Cargo" label-class="text-dark"
                    value="{{ $empleados->empCargo }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-fw fa-tape text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                {{-- With prepend slot, sm size, and label 
                <x-adminlte-textarea type="text" name="proDescripcion" label="Descripción" rows=5 label-class="text-warning" igroup-size="sm">
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-lg fa-file-alt text-warning"></i>
                        </div>
                    </x-slot>
                    {{$productos->proDescripcion}}
                </x-adminlte-textarea> --}}
                {{-- With prepend slot, lg size, and label 
                <x-adminlte-select name="proEstado" label="Estado" label-class="text-lightblue" igroup-size="lg">
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-gradient-info">
                            <i class="fas fa-car-side"></i>
                        </div>
                    </x-slot>
                    <option value="{{$productos->proEstado}}">{{$productos->proEstado}}</option>
                    <option value="">SELECCIONE EL ESTADO DEL PRODUCTO</option>
                    <option value="activo">DISPONIBLE</option>
                    <option value="desactivo">NO DISPONIBLE</option>
                </x-adminlte-select> --}}
                {{-- With append slot, number type, and sm size 
                <x-adminlte-input type="text" name="proPrecio" label="Precio" placeholder="number" type="number"
                    igroup-size="sm" value="{{$productos->proPrecio}}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-hashtag"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input> --}}
                <x-adminlte-button type="submit" label="Modificar Empleado" theme="primary" icon="fas fa-save" />
            </form>
        </div>
    </div>
@stop