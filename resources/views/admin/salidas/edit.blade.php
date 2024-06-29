@extends('adminlte::page')

@section('title', 'SALIDAS-EDIT')

@section('content_header')
    <div class="card">
        <div class="card-body">
            <h1>CONSULTA DE LAS SALIDAS DE ENVIOS</h1>
        </div>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.salidas.update', $salidas->ID_Salida) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="seHoraSalida">Hora de Salida</label>
                                    <input type="datetime-local" name="seHoraSalida" id="seHoraSalida" class="form-control"
                                        value="{{ $salidas->seHoraSalida }}" required>
                                </div>
                                <x-adminlte-select name="ID_EncargadoTruck" id="ID_EncargadoTruck"
                                    label="Seleccione el Encargado del Camión...">
                                    <!-- Mostrar el encargado asignado -->
                                    @if ($encargadotruckAsociado)
                                        <option value="{{ $encargadotruckAsociado->ID_EncargadoTruck }}" selected>
                                            {{ $encargadotruckAsociado->etDescripcion }} (Asignado)
                                        </option>
                                    @endif

                                    <!-- Mostrar los encargados disponibles -->
                                    @foreach ($encargadotrucks as $encargado)
                                        <option value="{{ $encargado->ID_EncargadoTruck }}">
                                            {{ $encargado->etDescripcion }}
                                        </option>
                                    @endforeach
                                </x-adminlte-select>

                                <x-adminlte-button type="submit" label="Modificar Salida" theme="primary"
                                    icon="fas fa-save" />
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5>Envíos Asignados</h5>
                            @foreach ($salidas->envios as $envio)
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span>{{ $envio->envDescripcion }}</span>
                                    <form class="formEliminar"
                                        action="{{ route('salidas.remove-envio', $salidas->ID_Salida) }}" method="post">
                                        @csrf
                                        <input type="hidden" name="envio_id" value="{{ $envio->ID_Envio }}">
                                        <x-adminlte-button type="submit" label="Eliminar" theme="danger" />
                                    </form>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5>Envíos Disponibles</h5>
                            @foreach ($enviosDisponibles as $envio)
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span>{{ $envio->envDescripcion }}</span>
                                    <form action="{{ route('salidas.add-envio', $salidas->ID_Salida) }}" method="post">
                                        @csrf
                                        <input type="hidden" name="envio_id" value="{{ $envio->ID_Envio }}">
                                        <x-adminlte-button type="submit" label="Agregar" theme="success" />
                                    </form>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script>
        $(document).ready(function() {
            $('.formEliminar').submit(function(e) {
                e.preventDefault(); // Detener el envío automático del formulario
                Swal.fire({
                    title: "¿Estás seguro?",
                    text: "Se eliminará un Registro!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Sí, Eliminar!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Si se confirma, enviar el formulario manualmente
                        $(this).off("submit")
                            .submit(); // Desactivar el evento de submit para evitar bucles
                    }
                });
            });
        });
    </script>
@stop
