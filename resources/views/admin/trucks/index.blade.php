@extends('adminlte::page')

@section('title', 'CAMIONES')

@section('content_header')
    <div class="card">
        <div class="card-body">
            <h1>SE MOSTRARAN TODOS LOS CAMIONES</h1>
        </div>
    </div>
@stop

@section('css')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@stop


@section('content')

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

    <div class="card">
        <div class="card-body">
            @can('admin.trucks.create')
                <a href="{{ route('admin.trucks.create') }}" class="btn btn-primary float-right mt-2 mr-3">AGREGAR CAMIÓN</a>
            @endcan
            <br>
            <br>
            <br>
            <table class="table table-striper">
                <thead>
                    <tr>
                        <th></th>
                        <th>PLACA</th>
                        <th>SOAT</th>
                        <th>MARCA</th>
                        <th>CAPACIDAD PESO</th>
                        <th>ESTADO</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($trucks as $truck)
                        <tr>
                            <td>{{ $truck->ID_Camion }}</td>
                            <td>{{ $truck->truPlaca }}</td>
                            <td>{{ $truck->truSOAT }}</td>
                            <td>{{ $truck->truMarca }}</td>
                            <td>{{ $truck->truCapacidadPeso }}</td>
                            <td>
                                @php
                                    $estados = [
                                        1 => 'LIBRE',
                                        2 => 'OCUPADO',
                                    ];
                                    $estado = $estados[$truck->truEstado];
                                    $color = '';
                                    switch ($estado) {
                                        case 'LIBRE':
                                            $color = 'btn btn-success disabled';
                                            break;
                                        case 'OCUPADO':
                                            $color = 'btn btn-warning disabled';
                                            break;
                                        default:
                                            $color = '';
                                            break;
                                    }
                                    echo '<span class="' . $color . '">' . $estado . '</span>';
                                @endphp
                            </td>
                            @can('admin.trucks.edit')
                                <td width="10px">
                                    <a class="btn btn-primary" href="{{ route('admin.trucks.edit', $truck) }}">Editar</a>
                                </td>
                            @endcan
                            @can('admin.trucks.destroy')
                                <td width="10px">
                                    <form class="formEliminar" action="{{ route('admin.trucks.destroy', $truck) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </form>
                                </td>
                            @endcan
                        </tr>
                    @endforeach
                </tbody>
            </table>
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
