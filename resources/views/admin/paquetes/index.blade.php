@extends('adminlte::page')

@section('title', 'PAQUETES-VISTA')

@section('content_header')
    <div class="card">
        <div class="card-body">
            <h1>SE MOSTRARAN TODOS LOS PAQUETES</h1>
        </div>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <!--
                    @can('admin.paquetes.create')
        <a href="{{ route('admin.paquetes.create') }}" class="btn btn-primary float-right mt-2 mr-3">NUEVO PAQUETE</a>
    @endcan-->
            <br>
            <br>
            <br>
            <table class="table table-striper">
                <thead>
                    <tr>
                        <th></th>
                        <th>DESCRIPCIÓN</th>
                        <th>CANTIDAD</th>
                        <th>PRECIO</th>
                        <th>PESO/KG</th>
                        <th>TAMAÑO</th>
                        <th>ESTADO</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($paquetes as $paq)
                        <tr>
                            <td>{{ $paq->ID_Paquete }}</td>
                            <td>{{ $paq->paqDescripcion }}</td>
                            <td>{{ $paq->paqCantidad }}</td>
                            <td>{{ $paq->paqPrecio }}</td>
                            <td>{{ $paq->paqPeso }}</td>
                            <td>{{ $paq->paqTamaño }}</td>
                            <td>
                                @php
                                    $estados = [
                                        1 => 'pendiente',
                                        2 => 'en proceso',
                                        3 => 'finalizado',
                                    ];
                                    $estado = $estados[$paq->paqEstado];
                                    $color = '';
                                    switch ($estado) {
                                        case 'pendiente':
                                            $color = 'btn btn-danger disabled';
                                            break;
                                        case 'en proceso':
                                            $color = 'btn btn-warning disabled';
                                            break;
                                        case 'finalizado':
                                            $color = 'btn btn-success disabled';
                                            break;
                                        default:
                                            $color = '';
                                            break;
                                    }
                                    echo '<span class="' . $color . '">' . $estado . '</span>';
                                @endphp
                            </td>
                            @can('admin.paquetes.edit')
                                <td width="10px">
                                    <a class="btn btn-primary" href="{{ route('admin.paquetes.edit', $paq) }}">Editar</a>
                                </td>
                            @endcan
                            @can('admin.paquetes.destroy')
                                <td width="10px">
                                    <form class="formEliminar" action="{{ route('admin.paquetes.destroy', $paq) }}"
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
