@extends('adminlte::page')

@section('title', 'EMPLEADOS')

@section('content_header')
    <div class="card">
        <div class="card-body">
            <h1>SE MOSTRARAN TODOS LOS EMPLEADOS</h1>
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
            @can('admin.empleados.create')
                <a href="{{ route('admin.empleados.create') }}" class="btn btn-primary float-right mt-2 mr-3">NUEVO EMPLEADO</a>
            @endcan
            <br>
            <br>
            <br>
            <table class="table table-striper">
                <thead>
                    <tr>
                        <th></th>
                        <th>CODIGO</th>
                        <th>NOMBRE</th>
                        <th>TELEFONO</th>
                        <th>EMAIL</th>
                        <th>DIRECCIÓN</th>
                        <th>CARGO</th>
                        <th>SUELDO</th>
                        <th>ESTADO</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($empleados as $emple)
                        <tr>
                            <td>{{ $emple->ID_Empleado }}</td>
                            <td>{{ $emple->empCodigo }}</td>
                            <td>{{ $emple->empNombre }}</td>
                            <td>{{ $emple->empTelefono }}</td>
                            <td>{{ $emple->empEmail }}</td>
                            <td>{{ $emple->empDireccion }}</td>
                            <td>{{ $emple->empCargo }}</td>
                            <td>{{ $emple->empSueldo }}</td>
                            <td>
                                @php
                                    $estados = [
                                        1 => 'LIBRE',
                                        2 => 'OCUPADO',
                                    ];
                                    $estado = $estados[$emple->empEstado];
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
                            @can('admin.empleados.edit')
                            <td width="10px">
                                <a class="btn btn-primary" href="{{ route('admin.empleados.edit', $emple) }}">Editar</a>
                            </td>
                            @endcan
                            @can('admin.empleados.destroy')
                            <td width="10px">
                                <form class="formEliminar" action="{{ route('admin.empleados.destroy', $emple) }}"
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
