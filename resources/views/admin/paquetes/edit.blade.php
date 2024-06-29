@extends('adminlte::page')

@section('title', 'PAQUETES-EDIT')

@section('content_header')
    <div class="card">
        <div class="card-body">
            <h1>PODRAS EDITAR EL PAQUETE</h1>

        </div>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.paquetes.update', $paquete->ID_Paquete) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <!-- Primer cuerpo en la primera columna -->
                    <div class="col-md-6">
                        <div class="card-body">
                            <x-adminlte-input type="text" name="paqCodigo" label="Codigo"
                                placeholder="ingrese codigo del paquete..." label-class="text-dark"
                                value="{{ $paquete->paqCodigo }}">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text">
                                        <i class="far fa-fw fa-file-alt text-lightblue"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-input>
                            <x-adminlte-input type="text" name="paqDescripcion" label="Descripción"
                                placeholder="ingrese la descripción del paquete..." label-class="text-dark"
                                value="{{ $paquete->paqDescripcion }}">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text">
                                        <i class="far fa-fw fa-file-alt text-lightblue"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-input>
                            <x-adminlte-input type="text" name="paqPrecio" label="Precio"
                                placeholder="precio del paquete..." type="number" igroup-size="lg"
                                value="{{ $paquete->paqPrecio }}">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text bg-dark">
                                        <i class="fas fa-hashtag"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-input>
                            <x-adminlte-input type="text" name="paqPeso" label="Peso" placeholder="peso del paquete..."
                                type="number" igroup-size="lg" value="{{ $paquete->paqPeso }}">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text bg-dark">
                                        <i class="fas fa-hashtag"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-input>
                            <x-adminlte-select name="paqTamaño" label="Tamaño" label-class="text-lightblue"
                                igroup-size="lg">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text bg-gradient-info">
                                        <i class="fas fa-fw fa-cog"></i>
                                    </div>
                                </x-slot>
                                <option value="">SELECCIONA EL TAMAÑO</option>
                                <option value="pequeño" {{ $paquete->paqTamaño == 'pequeño' ? 'selected' : '' }}>PEQUEÑO
                                </option>
                                <option value="mediano" {{ $paquete->paqTamaño == 'mediano' ? 'selected' : '' }}>MEDIANO
                                </option>
                                <option value="grande" {{ $paquete->paqTamaño == 'grande' ? 'selected' : '' }}>GRANDE
                                </option>
                            </x-adminlte-select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card-body">
                            <h3>Imagen actual del paquete:</h3>
                            <div>
                                <div class="form-group">
                                    <label for="paqImagen"></label>
                                    @if ($paquete->paqImagen)
                                        <img src="{{ asset('storage/' . $paquete->paqImagen) }}" alt="Imagen del paquete"
                                            class="img-thumbnail" width="300px" height="300px">
                                    @else
                                        <p>No hay imagen disponible</p>
                                    @endif
                                </div>
                                <label class="form-label" for="paqImagen">Imagen del Paquete</label>
                                <input class="form-control mb-3 ml-3" type="file" name="paqImagen" id="paqImagen">
                            </div>
                        </div>
                    </div>
                </div>
                <x-adminlte-button type="submit" label="Modificar Paquete" theme="primary" icon="fas fa-save" class="float-right mb-2 ml-3" />
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
