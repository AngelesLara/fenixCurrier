@extends('adminlte::page')

@section('title', 'PREDICCIONES-PMV2')

@section('content_header')
    <div class="row-12">
        <div class="card">
            <div class="card-body">
                <h1 class="text-center">PREDICCIONES DEL MACHINE LEARNING PMV2</h1>
            </div>
        </div>
    </div>
@stop

@section('content')
    @if (@session('success'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
            Toast.fire({
                icon: "success",
                title: "PREDICCIÓN EXITOSA!"
            });
        </script>
    @endif
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <form method="GET" action="{{ route('admin.predicciones.pmv2') }}"
                                onsubmit="return validateForm()">
                                <div class="col-md-6">
                                    <label for="fecha-input">Ingrese una fecha:</label>
                                    <input type="date" id="fecha-input" name="fecha">
                                </div>
                                <div class="col-md-12">
                                    <button type="submit">Obtener Predicción</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="text-center">Predicciones</h1>
                            @if (isset($data))
                                <p>Fecha: {{ $data['fecha'] }}</p>
                                <p>Predicción: {{ $data['prediccion'] }}</p>
                            @elseif (isset($error))
                                <p>Fecha: - </p>
                                <p>Predicción: - </p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
            </div>
        </div>
    </div>
@stop

@section('js')
    <script>
        function validateForm() {
            var fecha = document.getElementById('fecha-input').value;
            if (!fecha) {
                Swal.fire({
                    position: "top-end",
                    icon: "warning",
                    title: "SELECCIONE UNA FECHA",
                    showConfirmButton: false,
                    timer: 1500
                });
                return false; // Detiene el envío del formulario si la fecha está vacía
            }
            return true; // Permite el envío del formulario si la fecha no está vacía
        }
    </script>
@stop
