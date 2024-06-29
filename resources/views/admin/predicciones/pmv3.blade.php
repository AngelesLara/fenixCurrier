@extends('adminlte::page')

@section('title', 'PREDICCIONES-PMV3')

@section('content_header')
    <div class="row-12">
        <div class="card">
            <div class="card-body">
                <h1 class="text-center">PREDICCIONES DEL MACHINE LEARNING PMV3</h1>
            </div>
        </div>
    </div>
@stop

@push('css')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endpush

@section('content')
    @if (session('success'))
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
                title: "{{ session('success') }}"
            });
        </script>
    @endif
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="{{ route('admin.predicciones.pmv3') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="num_envios">Número de envíos:</label>
                                    <input type="number" class="form-control" id="num_envios" name="num_envios" required>
                                </div>
                                <div class="form-group">
                                    <label for="total_monto_envios">Total monto de envíos:</label>
                                    <input type="number" class="form-control" id="total_monto_envios"
                                        name="total_monto_envios" required>
                                </div>
                                <div class="form-group">
                                    <label for="dias_ultimo_envio">Días desde el último envío:</label>
                                    <input type="number" class="form-control" id="dias_ultimo_envio"
                                        name="dias_ultimo_envio" required>
                                </div>
                                <div class="form-group">
                                    <label for="number_of_complaints">Número de quejas:</label>
                                    <input type="number" class="form-control" id="number_of_complaints"
                                        name="number_of_complaints" required>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Obtener Predicción</button>
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
                                <div class="card">
                                    <div class="card-body">
                                        <h3 class="text-center">Predicción: {{ $data['prediction'] }}</h3>
                                    </div>
                                    <div class="card-footer">
                                        <p class="text-center">1: Abandona</p>
                                        <p class="text-center">0: No abandona</p>
                                    </div>
                                </div>
                            @elseif (isset($error))
                                <p>Predicción: - </p>
                                <p>Probabilidad: - </p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
