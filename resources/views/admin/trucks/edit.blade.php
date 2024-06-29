@extends('adminlte::page')

@section('title', 'EMPLEADOS-CREATE')

@section('content_header')
    <div class="card">
        <div class="card-body">
            <h1>PODRAS EDITAR LOS CAMIONES</h1>

        </div>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.trucks.update', $trucks) }}" method="post">
                @csrf
                @method('PUT')
                {{-- With prepend slot --}}
                <x-adminlte-input type="text" name="truPlaca" label="Placa" placeholder="ingrese la placa del transporte..."
                    label-class="text-dark" value="{{ $trucks->truPlaca }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="far fa-fw fa-file-alt text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                <x-adminlte-input type="text" name="truSOAT" label="SOAT" placeholder="ingrese el SOAT del transporte..."
                    label-class="text-dark" value="{{ $trucks->truSOAT }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="far fa-fw fa-file-alt text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                <x-adminlte-input type="text" name="truMarca" label="Marca" placeholder="ingrese la marca del transporte..."
                    label-class="text-dark" value="{{ $trucks->truMarca }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-fw fa-phone text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                <x-adminlte-input type="text" name="truCapacidadPeso" label="Capacidad de Peso" placeholder="ingrese la capacidad de peso del transporte..."
                    label-class="text-dark" value="{{ $trucks->truCapacidadPeso }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-fw fa-at text-lightblue"></i>
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