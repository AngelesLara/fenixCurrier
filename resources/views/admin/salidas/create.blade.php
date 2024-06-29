@extends('adminlte::page')

@section('title', 'SALIDAS')

@section('content_header')
    <div class="card">
        <div class="card-body">
            <h1>Administración de las Salidas de Envios...</h1>
        </div>
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.salidas.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="seHoraSalida">Hora de Salida</label>
                            <input type="datetime-local" name="seHoraSalida" id="seHoraSalida" class="form-control"
                                required>
                        </div>
                        <x-adminlte-select name="ID_EncargadoTruck" id="ID_EncargadoTruck"
                            label="Seleccione el Encargado del Camión...">
                            <option value="" selected disabled>Selecciona el encargado...</option>
                            @foreach ($encargadotrucks as $encargado)
                                <option value="{{ $encargado->ID_EncargadoTruck }}">{{ $encargado->etDescripcion }}</option>
                            @endforeach
                        </x-adminlte-select>
                        <x-adminlte-select name="envios[]" id="envios" label="Seleccione los Envíos..." multiple>
                            @foreach ($envios as $envio)
                                <option value="{{ $envio->ID_Envio }}">{{ $envio->envDescripcion }}</option>
                            @endforeach
                        </x-adminlte-select>
                        <button type="submit" class="btn btn-primary">Crear Salida</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
