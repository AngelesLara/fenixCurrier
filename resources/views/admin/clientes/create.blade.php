@extends('adminlte::page')

@section('title', 'CLIENTES-CREATE')

@section('content_header')
    <div class="card">
        <div class="card-body">
            <h1>CREACIÓN DE CLIENTES</h1>
        </div>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.clientes.store') }}" method="post">
                @csrf
                {{-- With prepend slot --}}
                <x-adminlte-input type="text" name="cliDNI" label="DNI" placeholder="ingrese el codigo..."
                    label-class="text-dark" value="{{ old('cliDNI') }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="far fa-fw fa-file-alt text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                <x-adminlte-input type="text" name="cliNombre" label="Nombre" placeholder="ingrese el nombre..."
                    label-class="text-dark" value="{{ old('cliNombre') }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="far fa-fw fa-file-alt text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                <x-adminlte-input type="text" name="cliDireccion" label="Direccion" placeholder="ingrese el dirección..."
                    label-class="text-dark" value="{{ old('cliDireccion') }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-fw fa-map-marker text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                <x-adminlte-input type="text" name="cliTelefono" label="Telefono" placeholder="ingrese el telefono..."
                    label-class="text-dark" value="{{ old('cliTelefono') }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-fw fa-phone text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                <x-adminlte-select name="ID_tpCliente" label="Tipo Cliente" label-class="text-lightblue" igroup-size="lg">
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-gradient-info">
                            <i class="fas fa-fw fa-cog"></i>
                        </div>
                    </x-slot>
                    <option value="">SELECCIONE EL TIPO DE PERSONA</option>
                    @foreach ($tipoclientes as $tipocli)
                        <option value="{{ $tipocli->ID_tpCliente }}">{{ $tipocli->tpcNombre }}</option>
                    @endforeach
                </x-adminlte-select>
                <x-adminlte-button type="submit" label="Guardar" theme="primary" icon="fas fa-save mr-2" />
            </form>
        </div>
    </div>
@stop