@extends('adminlte::page')

@section('title', 'CLIENTES')

@section('content_header')
    <div class="card">
        <div class="card-body">
            <h1>SE MOSTRARAN TODOS LOS CLIENTES</h1>
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
            <table class="table table-striper">
                <thead>
                    <tr>
                        <th></th>
                        <th>DNI/RUC</th>
                        <th>RAZÓN SOCIAL</th>
                        <th>EMAIL</th>
                        <th>DIRECCIÓN</th>
                        <th>TELEFONO</th>
                        <th>TIPO</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clientes as $cli)
                        <tr>
                            <td>{{ $cli->ID_Cliente }}</td>
                            <td>{{ $cli->cliRUC }}</td>
                            <td>{{ $cli->cliRazonSocial }}</td>
                            <td>{{ $cli->cliEmail }}</td>
                            <td>{{ $cli->cliDireccion }}</td>
                            <td>{{ $cli->cliTelefono }}</td>
                            <td>{{ $cli->tipocliente->tpcNombre }}</td>
                            
                            <td width="5px">
                                <a class="btn btn-primary" href="{{ route('admin.clientes.edit', $cli) }}">Editar</a>
                            </td>
                            <td width="5px">
                                <form class="formEliminar" action="{{ route('admin.clientes.destroy', $cli) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                            </td>
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
