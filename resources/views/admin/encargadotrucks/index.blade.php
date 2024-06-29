@extends('adminlte::page')

@section('title', 'ENCARGADO DE CAMIONES')

@section('content_header')
    <div class="card">
        <div class="card-body">
            <h1>SE MOSTRARAN TODOS LOS ENCARGADOS DE LOS CAMIONES</h1>
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
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @can('admin.encargadotrucks.create')
                        <a href="{{ route('admin.encargadotrucks.create') }}"
                            class="btn btn-primary float-right mt-2 mr-3">AGREGAR
                            NUEVO ENCARGADO DEL CAMIÓN</a>
                    @endcan
                    <br>
                    <br>
                    <br>
                    <table class="table table-striper">
                        <thead>
                            <tr>
                                <th></th>
                                <th>DESCRIPCIÓN</th>
                                <th>ESTADO</th>
                                <th>CAMION</th>
                                <th>EMPLEADO</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($encargadotrucks as $enctruck)
                                <tr>
                                    <td>{{ $enctruck->ID_EncargadoTruck }}</td>
                                    <td>{{ $enctruck->etDescripcion }}</td>
                                    <td>
                                        @php
                                            $estados = [
                                                1 => 'LIBRE',
                                                2 => 'OCUPADO',
                                            ];
                                            $estado = $estados[$enctruck->etEstado];
                                            $color = '';
                                            switch ($estado) {
                                                case 'LIBRE':
                                                    $color = 'btn btn-success';
                                                    break;
                                                case 'OCUPADO':
                                                    $color = 'btn btn-warning';
                                                    break;
                                                default:
                                                    $color = '';
                                                    break;
                                            }
                                            echo '<span class="' . $color . '">' . $estado . '</span>';
                                        @endphp
                                    </td>
                                    <td>{{ $enctruck->truck->truPlaca }}</td>
                                    <td>{{ $enctruck->empleado->empNombre ?? '' }}</td>
                                    @can('admin.encargadotrucks.edit')
                                        <td width="10px">
                                            <a class="btn btn-primary"
                                                href="{{ route('admin.encargadotrucks.edit', $enctruck) }}">Editar</a>
                                        </td>
                                    @endcan
                                    @can('admin.encargadotrucks.destroy')
                                        <td width="10px">
                                            <form class="formEliminar"
                                                action="{{ route('admin.encargadotrucks.destroy', $enctruck) }}" method="POST">
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
