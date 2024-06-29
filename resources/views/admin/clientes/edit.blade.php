@extends('adminlte::page')

@section('title', 'CLIENTES-EDITAR')

@section('content_header')
    <div class="card">
        <div class="card-body">
            <h1>PODRAS EDITAR A: {{ $clientes->cliRazonSocial }}</h1>

        </div>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.clientes.update', $clientes) }}" method="post">
                @csrf
                @method('PUT')
                {{-- With prepend slot --}}
                <x-adminlte-input type="text" name="cliRUC" label="RUC" label-class="text-dark"
                    value="{{ $clientes->cliRUC }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="far fa-fw fa-file-alt text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                <x-adminlte-input type="text" name="cliRazonSocial" label="Razón Social" label-class="text-dark"
                    value="{{ $clientes->cliRazonSocial }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="far fa-fw fa-file-alt text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                <x-adminlte-input type="text" name="cliEmail" label="Email" label-class="text-dark"
                    value="{{ $clientes->cliEmail }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="far fa-fw fa-file-alt text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                <x-adminlte-input type="text" name="cliDireccion" label="Dirección" label-class="text-dark"
                    value="{{ $clientes->cliDireccion }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-fw fa-map-marker text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                <x-adminlte-input type="text" name="cliTelefono" label="Telefono" label-class="text-dark"
                    value="{{ $clientes->cliTelefono }}">
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
                    <option value="" selected disabled>SELECCIONE EL TIPO DE PERSONA</option>
                    @foreach ($tipoclientes as $tipocli)
                        <option value="{{ $tipocli->ID_tpCliente }}" @if ($clientes->tipoCliente && $clientes->tipoCliente->ID_tpCliente == $tipocli->ID_tpCliente) selected @endif>
                            {{ $tipocli->tpcNombre }}</option>
                    @endforeach
                </x-adminlte-select>
                <x-adminlte-button type="submit" label="Modificar Cliente" theme="primary" icon="fas fa-save" />
            </form>
        </div>
    </div>
@stop
