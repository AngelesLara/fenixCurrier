@extends('adminlte::page')

@section('title', 'ENVIOS-CREATE')

@section('content_header')
    <div class="card">
        <div class="card-body">
            <h1>CREACIÓN DE ENVIOS</h1>
        </div>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.envios.store') }}" method="post">
                @csrf
                <div class="row">
                    <!-- datos de clientes / primer cuerpo en la tercera columna -->
                    <div class="col-md-6">
                        <div class="card-body">
                            <h3>DATOS DE CLIENTE ENVIA</h3>
                            <x-adminlte-select name="ID_tpClienteE" label="Tipo Cliente" label-class="text-lightblue"
                                igroup-size="lg">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text bg-gradient-info">
                                        <i class="fas fa-fw fa-cog"></i>
                                    </div>
                                </x-slot>
                                <option value="" selected disabled>SELECCIONE EL TIPO DE PERSONA</option>
                                @foreach ($tipoclientes as $tipocli)
                                    <option value="{{ $tipocli->ID_tpCliente }}">{{ $tipocli->tpcNombre }}</option>
                                @endforeach
                            </x-adminlte-select>
                            <x-adminlte-input type="text" name="cliRUCE" label="RUC/DNI"
                                placeholder="ingrese el codigo..." label-class="text-dark" value="{{ old('cliRUCE') }}">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text">
                                        <i class="far fa-fw fa-file-alt text-lightblue"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-input>
                            <x-adminlte-input type="text" name="cliRazonSocialE" label="Razón Social"
                                placeholder="ingrese el nombre..." label-class="text-dark"
                                value="{{ old('cliRazonSocialE') }}">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text">
                                        <i class="far fa-fw fa-file-alt text-lightblue"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-input>
                            <x-adminlte-input type="text" name="cliEmailE" label="Email"
                                placeholder="ingrese el nombre..." label-class="text-dark" value="{{ old('cliEmailE') }}">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text">
                                        <i class="far fa-fw fa-file-alt text-lightblue"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-input>
                            <x-adminlte-input type="text" name="cliDireccionE" label="Dirección"
                                placeholder="ingrese el dirección..." label-class="text-dark"
                                value="{{ old('cliDireccionE') }}">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text">
                                        <i class="fas fa-fw fa-map-marker text-lightblue"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-input>
                            <x-adminlte-input type="text" name="cliTelefonoE" label="Telefono"
                                placeholder="ingrese el telefono..." label-class="text-dark"
                                value="{{ old('cliTelefonoE') }}">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text">
                                        <i class="fas fa-fw fa-phone text-lightblue"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-input>
                        </div>
                    </div>
                    <!-- datos de envios / cuerpo en la segunda columna -->
                    <div class="col-md-6">
                        <div class="card-body">
                            <h3>DATOS DE ENVIOS</h3>
                            <x-adminlte-input type="text" name="envCodigo" id="envCodigo" label="Código"
                                placeholder="ingrese el codigo..." label-class="text-dark" value="{{ old('envCodigo') }}">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text">
                                        <i class="far fa-fw fa-file-alt text-lightblue"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-input>
                            <x-adminlte-input type="text" name="envDescripcion" id="envDescripcion" label="Descripción"
                                placeholder="ingrese descripción..." label-class="text-dark"
                                value="{{ old('envDescripcion') }}">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text">
                                        <i class="far fa-fw fa-file-alt text-lightblue"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-input>
                            <x-adminlte-input type="text" name="envFecha_Llegada" id="envFecha_Llegada"
                                label="Fecha Llegada" placeholder="ingrese la fecha de llegada estimada..."
                                label-class="text-dark" value="{{ old('envFecha_Llegada') }}">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text">
                                        <i class="far fa-fw fa-file-alt text-lightblue"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-input>
                            <!-- Selección de destinos -->
                            <x-adminlte-select name="ID_DestinoR" id="ID_DestinoR" label="Seleccione el lugar de SALIDA...">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text bg-gradient-info">
                                        <i class="fas fa-fw fa-map-marker text-lightblue"></i>
                                    </div>
                                </x-slot>
                                <option value="" selected disabled>Seleccionar lugar de Envio</option>
                                @foreach ($destinos as $des)
                                    <option value="{{ $des->ID_Destino }}">{{ $des->desNombre }}</option>
                                @endforeach
                            </x-adminlte-select>
                            <x-adminlte-select name="ID_DestinoD" id="ID_DestinoD"
                                label="Seleccione el lugar de RECEPCIÓN...">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text bg-gradient-info">
                                        <i class="fas fa-fw fa-map-marker text-lightblue"></i>
                                    </div>
                                </x-slot>
                                <option value="" selected disabled>Seleccionar lugar de Recepción</option>
                                @foreach ($destinos as $des)
                                    <option value="{{ $des->ID_Destino }}">{{ $des->desNombre }}</option>
                                @endforeach
                            </x-adminlte-select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- primer cuerpo en la tercera columna -->
                    <div class="col-md-6">
                        <div class="card-body">
                            <h3>DATOS DE CLIENTE RECIBE</h3>
                            <x-adminlte-select name="ID_tpClienteR" label="Tipo Cliente" label-class="text-lightblue"
                                igroup-size="lg">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text bg-gradient-info">
                                        <i class="fas fa-fw fa-cog"></i>
                                    </div>
                                </x-slot>
                                <option value="" selected disabled>SELECCIONE EL TIPO DE PERSONA</option>
                                @foreach ($tipoclientes as $tipocli)
                                    <option value="{{ $tipocli->ID_tpCliente }}">{{ $tipocli->tpcNombre }}</option>
                                @endforeach
                            </x-adminlte-select>
                            <x-adminlte-input type="text" name="cliRUCR" label="RUC/DNI"
                                placeholder="ingrese el codigo..." label-class="text-dark" value="{{ old('cliRUCR') }}">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text">
                                        <i class="far fa-fw fa-file-alt text-lightblue"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-input>
                            <x-adminlte-input type="text" name="cliRazonSocialR" label="Razón Social"
                                placeholder="ingrese el nombre..." label-class="text-dark"
                                value="{{ old('cliRazonSocialR') }}">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text">
                                        <i class="far fa-fw fa-file-alt text-lightblue"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-input>
                            <x-adminlte-input type="text" name="cliEmailR" label="Email"
                                placeholder="ingrese el nombre..." label-class="text-dark"
                                value="{{ old('cliEmailR') }}">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text">
                                        <i class="far fa-fw fa-file-alt text-lightblue"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-input>
                            <x-adminlte-input type="text" name="cliDireccionR" label="Dirección"
                                placeholder="ingrese el dirección..." label-class="text-dark"
                                value="{{ old('cliDireccionR') }}">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text">
                                        <i class="fas fa-fw fa-map-marker text-lightblue"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-input>
                            <x-adminlte-input type="text" name="cliTelefonoR" label="Telefono"
                                placeholder="ingrese el telefono..." label-class="text-dark"
                                value="{{ old('cliTelefonoR') }}">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text">
                                        <i class="fas fa-fw fa-phone text-lightblue"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-input>
                        </div>
                    </div>
                    <!-- Columna de PAQUETES -->
                    <div class="col-md-6">
                        <div class="card-body">
                            <div class="row mb-3">
                                <h3>PAQUETES / SELECCIÓN</h3>
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-success" id="agregarPaquete">+</button>
                                </div>
                            </div>
                            <br>
                            <!-- Campos para el primer paquete -->
                            <div class="row mb-3 paquete">
                                <div class="col-md-2">
                                    <label>Código</label>
                                </div>
                                <div class="col-md-2">
                                    <label>Descripción</label>
                                </div>
                                <div class="col-md-2">
                                    <label>Cantidad</label>
                                </div>
                                <div class="col-md-2">
                                    <label>Precio</label>
                                </div>
                                <div class="col-md-2">
                                    <label>Peso/KG</label>
                                </div>
                                <div class="col-md-2">
                                    <label>Tamaño</label>
                                </div>
                                <div class="col-md-2">
                                </div>
                            </div>

                            <!-- Campos para los paquetes adicionales -->
                            <div id="paquetesCampos">
                                <!-- Aquí se agregarán dinámicamente los campos adicionales -->
                            </div>
                        </div>
                    </div>
                </div>
                <fieldset id="paymentInfo" disabled>
                    <div class="row">
                        <!-- primer cuerpo en la tercera columna -->
                        <div class="col-md-12">
                            <div class="card-body">
                                <h2>INFORMACIÓN DE PAGO</h2>
                                <x-adminlte-select name="envMetodoPago" id="envMetodoPago" label="Metodo de Pagos:"
                                    label-class="text-lightblue" igroup-size="lg">
                                    <x-slot name="prependSlot">
                                        <div class="input-group-text bg-gradient-info">
                                            <i class="fas fa-dollar-sign"></i>
                                        </div>
                                    </x-slot>
                                    <option value="" selected disabled>SELECCIONE EL TIPO DE PAGO</option>
                                    <option value="yape">YAPE</option>
                                    <option value="plin">PLIN</option>
                                    <option value="efectivo">EFECTIVO</option>
                                    <option value="visa">VISA</option>
                                    <option value="transferencia">TRANSFERENCIA</option>
                                </x-adminlte-select>
                                <x-adminlte-input type="text" name="envPagoCon" id="envPagoCon" label="Pago Con"
                                    placeholder="ingrese el monto de pago del cliente..." label-class="text-dark">
                                    <x-slot name="prependSlot">
                                        <div class="input-group-text">
                                            <i class="fas fa-dollar-sign text-green"></i>
                                        </div>
                                    </x-slot>
                                </x-adminlte-input>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card-body">
                                <div class="col-md-2">
                                    <label>Vuelto:</label>
                                    <span id="vuelto"></span>
                                </div>
                                <div class="col-md-2">
                                    <label>Total:</label>
                                    <span id="total"></span>
                                    <input type="hidden" name="envTotal" id="envTotal" value="0">
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <x-adminlte-button type="submit" label="Guardar Envio" theme="primary" icon="fas fa-save mr-2"
                    class="float-right mb-2 ml-3" />
            </form>
        </div>
    </div>
@stop

@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Lista de IDs de los campos que se deben validar
            const requiredFields = [
                'ID_tpClienteE', 'cliRUCE', 'cliRazonSocialE', 'cliEmailE', 'cliDireccionE', 'cliTelefonoE',
                'envCodigo', 'envDescripcion', 'envFecha_Llegada', 'ID_DestinoR', 'ID_DestinoD',
                'ID_tpClienteR', 'cliRUCR', 'cliRazonSocialR', 'cliEmailR', 'cliDireccionR', 'cliTelefonoR'
            ];

            // Función para verificar si todos los campos requeridos están llenos
            function checkFields() {
                return requiredFields.every(id => {
                    const element = document.getElementById(id);
                    return element && element.value.trim() !== '';
                });
            }

            // Función para habilitar o deshabilitar la sección de pago
            function togglePaymentSection() {
                const paymentSection = document.getElementById('paymentInfo');
                if (checkFields()) {
                    paymentSection.removeAttribute('disabled');
                } else {
                    paymentSection.setAttribute('disabled', true);
                }
            }

            // Añadir evento 'input' a todos los campos requeridos
            requiredFields.forEach(id => {
                const element = document.getElementById(id);
                if (element) {
                    element.addEventListener('input', togglePaymentSection);
                }
            });

            // Evento de clic en la sección de pago
            $('#paymentInfo').click(function() {
                if (!checkFields()) {
                    // Mostrar alerta si los campos requeridos no están llenos
                    Swal.fire({
                        icon: "warning",
                        title: "TODOS LOS CAMPOS REQUERITOS",
                        text: "Por favor complete todos los campos antes de acceder a la información de pago...",
                    });
                }
            });

            // Script existente para agregar paquetes y calcular total
            var paqueteIndex = 0;

            $('#agregarPaquete').click(function() {
                paqueteIndex++;
                var row = `
                    <div class="row mb-2 paquete">
                        <div class="col-md-2">
                            <input type="text" name="paquetes[${paqueteIndex}][paqCodigo]" class="form-control" placeholder="Código" />
                        </div>
                        <div class="col-md-2">
                            <input type="text" name="paquetes[${paqueteIndex}][paqDescripcion]" class="form-control" placeholder="Descripción" />
                        </div>
                        <div class="col-md-2">
                            <input type="text" name="paquetes[${paqueteIndex}][paqCantidad]" class="form-control cantidad" placeholder="Cantidad" />
                        </div>
                        <div class="col-md-2">
                            <input type="text" name="paquetes[${paqueteIndex}][paqPrecio]" class="form-control precio" placeholder="Precio" />
                        </div>
                        <div class="col-md-2">
                            <input type="text" name="paquetes[${paqueteIndex}][paqPeso]" class="form-control" placeholder="Peso" />
                        </div>
                        <div class="col-md-2">
                            <input type="text" name="paquetes[${paqueteIndex}][paqTamaño]" class="form-control" placeholder="Tamaño" />
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-danger eliminarPaquete">-</button>
                        </div>
                    </div>`;
                $('#paquetesCampos').append(row);
                attachInputEvents();
                togglePaymentSection();
            });

            // Eliminar paquete de la tabla
            $(document).on('click', '.eliminarPaquete', function() {
                $(this).closest('.row').remove();
                calcularTotal();
                calcularVuelto();
            });



            // Función para calcular el total
            function calcularTotal() {
                var total = 0;
                $('div.paquete').each(function() {
                    var cantidad = parseFloat($(this).find('.cantidad').val()) || 0;
                    var precio = parseFloat($(this).find('.precio').val()) || 0;
                    total += cantidad * precio;
                });
                $('#total').text(total.toFixed(2));
                $('#envTotal').val(total.toFixed(2)); // Actualizar el campo oculto
            }

            // Función para adjuntar eventos a los inputs
            function attachInputEvents() {
                $('.cantidad, .precio').off('input').on('input', function() {
                    calcularTotal();
                });
                $('#envPagoCon').off('input').on('input', function() {
                    calcularVuelto();
                });
            }

            // Función para calcular el vuelto
            function calcularVuelto() {
                var total = parseFloat($('#total').text()) || 0;
                var pagoCon = parseFloat($('#envPagoCon').val()) || 0;
                var vuelto = pagoCon - total;
                $('#vuelto').text(vuelto.toFixed(2));
            }

            // Inicializar eventos en los inputs existentes
            attachInputEvents();
            // Calcular el total inicialmente en caso de que haya valores precargados
            calcularTotal();
            calcularVuelto();
        });
    </script>
@stop
