@extends('adminlte::page')

@section('title', 'DESTINOS-CREATE')

@section('content_header')
    <div class="card">
        <div class="card-body">
            <h1>CREACIÓN DE DESTINOS</h1>
        </div>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.destinos.store') }}" method="post">
                @csrf
                {{-- With prepend slot --}}
                <x-adminlte-input type="text" name="desCodigo" label="Codigo" placeholder="ingrese el codigo del DESTINO..."
                    label-class="text-dark" value="{{ old('desCodigo') }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="far fa-fw fa-file-alt text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                <x-adminlte-input type="text" name="desNombre" label="Nombre" placeholder="ingrese el nombre del DESTINO..."
                    label-class="text-dark" value="{{ old('desNombre') }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="far fa-fw fa-file-alt text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                <x-adminlte-input type="text" name="desDescripcion" label="Descripción" placeholder="ingrese la descripción del destino..."
                    label-class="text-dark" value="{{ old('desDescripcion') }}" pattern="[a-zA-Z0-9\s\.,]+">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="far fa-fw fa-file-alt text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                <x-adminlte-input type="text" name="desDireccion" label="Dirección" placeholder="ingrese la dirección exacta..."
                    label-class="text-dark" value="{{ old('desDireccion') }}" pattern="[a-zA-Z0-9\s\.,]+">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-fw fa-phone text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                <x-adminlte-button type="submit" label="Guardar Destino" theme="primary" icon="fas fa-save mr-2" />
            </form>
        </div>
    </div>
@stop

@section('js')
    @if (session('message'))
        <script>
            $(document).ready(function() {
                let mensaje = "{{ session('message') }}";
                Swal.fire({
                    'title': 'Resultado',
                    'text': mensaje,
                    'icon': 'success',
                })
            })
        </script>
    @endif
@stop
