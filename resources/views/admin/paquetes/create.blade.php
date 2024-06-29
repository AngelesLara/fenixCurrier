@extends('adminlte::page')

@section('title', 'PAQUETES-CREATE')

@section('content_header')
    <div class="card">
        <div class="card-body">
            <h1>CREACIÓN DE PAQUETES</h1>
        </div>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.paquetes.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                {{-- With prepend slot --}}
                <x-adminlte-input type="text" name="paqCodigo" label="Codigo" placeholder="ingrese codigo del paquete..."
                    label-class="text-dark" value="{{ old('paqCodigo') }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="far fa-fw fa-file-alt text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                <x-adminlte-input type="text" name="paqDescripcion" label="Descripción"
                    placeholder="ingrese la descripción del paquete..." label-class="text-dark"
                    value="{{ old('paqDescripcion') }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="far fa-fw fa-file-alt text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                <x-adminlte-input type="text" name="paqPrecio" label="Precio" placeholder="precio del paquete..."
                    type="number" igroup-size="lg">
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-hashtag"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                <x-adminlte-input type="text" name="paqPeso" label="Peso" placeholder="peso del paquete..."
                    type="number" igroup-size="lg">
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-hashtag"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Imagen del Paquete</label>
                    <input class="form-control" type="file" name="paqImagen" id="formFile">
                </div>
                <x-adminlte-select name="paqTamaño" label="Tamaño" label-class="text-lightblue" igroup-size="lg">
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-gradient-info">
                            <i class="fas fa-fw fa-cog"></i>
                        </div>
                    </x-slot>
                    <option value="">SELECCIONA EL TAMAÑO</option>
                    <option value="pequeño">PEQUEÑO</option>
                    <option value="mediano">MEDIANO</option>
                    <option value="grande">GRANDE</option>
                </x-adminlte-select>
                <x-adminlte-button type="submit" label="Guardar" theme="primary" icon="fas fa-save mr-2" />
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
