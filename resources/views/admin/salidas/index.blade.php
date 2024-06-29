@extends('adminlte::page')

@section('title', 'SALIDAS DE ENVIOS')

@section('content_header')
    <div class="card">
        <div class="card-body">
            <h1>SE MOSTRARAN TODOS LAS SALIDAS DISPONIBLES PARA LOS ENVIOS</h1>
        </div>
    </div>
@stop

@section('css')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@stop


@section('content')
    <!-- alerta -->
    @if (@session('success'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 1500,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
            Toast.fire({
                icon: "success",
                title: "OPERACIÓN EXITOSA!"
            });
        </script>
    @endif
    <!-- contenido -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @can('admin.salidas.create')
                        <a href="{{ route('admin.salidas.create') }}" class="btn btn-primary float-right mt-2 mr-3">AGREGAR
                            NUEVA SALIDA</a>
                    @endcan
                    <br>
                    <br>
                    <br>
                    <table class="table table-striper">
                        <thead>
                            <tr>
                                <th></th>
                                <th>HORA DE SALIDA</th>
                                <th>ENCARGADO DEL ENVIO</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($salidas as $sal)
                                <tr>
                                    <td>{{ $sal->ID_Salida }}</td>
                                    <td>{{ $sal->seHoraSalida }}</td>
                                    <td>{{ $sal->encargadotruck->etDescripcion }}</td>
                                    @can('admin.salidas.edit')
                                        <td width="10px">
                                            <div style="width: 80px;"> <!-- editar el largo del boton -->
                                                <a class="btn btn-primary" href="{{ route('admin.salidas.edit', $sal) }}">
                                                    <i class="fas fa-eye"></i> Ver
                                                </a>
                                            </div>
                                        </td>
                                    @endcan
                                    @can('admin.salidas.destroy')
                                        <td width="10px">
                                            <form class="formEliminar" action="{{ route('admin.salidas.destroy', $sal) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <div style="width: 100px;"> <!-- editar el largo del boton -->
                                                    <button type="submit" class="btn btn-danger">
                                                        <i class="fas fa-trash-alt"></i> Eliminar
                                                    </button>
                                                </div>
                                            </form>
                                        </td>
                                    @endcan
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card-body">

            </div>
        </div>
    </div>
@stop

@section('css')
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
            })
        })
    </script>
@stop
