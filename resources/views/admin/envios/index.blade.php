@extends('adminlte::page')

@section('title', 'ENVIOS-VISTA')

@section('content_header')
    <div class="card">
        <div class="card-body">
            <h1>SE MOSTRARAN TODOS LOS ENVIOS</h1>
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
                timer: 3000,
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
            @can('admin.envios.create')
                <a href="{{ route('admin.envios.create') }}" class="btn btn-primary float-right mt-2 mr-3">NUEVO ENVIO</a>
            @endcan
            <br>
            <br>
            <br>
            <table class="table table-striper">
                <thead>
                    <tr>
                        <th></th>
                        <th>CODIGO</th>
                        <th>DESCRIPCION</th>
                        <th>ESTADO</th>
                        <th>TOTAL</th>
                        <th>METODO PAGO</th>
                        <th>FECHA LLEGADA</th>
                        <th>DESTINO SALIDA</th>
                        <th>DESTINO LLEGADA</th>
                        <th>VENDEDOR</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($envios as $env)
                        <tr>
                            <td>{{ $env->ID_Envio }}</td>
                            <td>{{ $env->envCodigo }}</td>
                            <td>{{ $env->envDescripcion }}</td>
                            <td>
                                @php
                                    $estados = [
                                        1 => 'PENDIENTE',
                                        2 => 'EN PROCESO',
                                        3 => 'FINALIZADO',
                                    ];
                                    $estado = $estados[$env->envEstado];
                                    $color = '';
                                    switch ($estado) {
                                        case 'PENDIENTE':
                                            $color = 'btn btn-danger';
                                            break;
                                        case 'EN PROCESO':
                                            $color = 'btn btn-warning';
                                            break;
                                        case 'FINALIZADO':
                                            $color = 'btn btn-success';
                                            break;
                                        default:
                                            $color = '';
                                            break;
                                    }
                                    echo '<span class="' . $color . '">' . $estado . '</span>';
                                @endphp
                            </td>
                            <td>{{ $env->envTotal }}</td>
                            <td>{{ $env->envMetodoPago }}</td>
                            <td>{{ $env->envFecha_Llegada }}</td>
                            <td>{{ $env->destinoR->desNombre }}</td>
                            <td>{{ $env->destinoD->desNombre }}</td>
                            <td>{{ $env->user->name }}</td>
                            @can('admin.envios.edit')
                                <td width="10px">
                                    <a class="btn btn-primary" href="{{ route('admin.envios.edit', $env) }}">Editar</a>
                                </td>
                            @endcan
                            @can('admin.envios.destroy')
                                <td width="10px">
                                    <form class="formEliminar" action="{{ route('admin.envios.destroy', $env) }}"
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
