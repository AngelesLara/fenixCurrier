<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Destino;
use App\Models\Envio;
use App\Models\Enviocliente;
use App\Models\Paquete;
use App\Models\Tipocliente;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnvioController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.envios.index')->only('index');
        $this->middleware('can:admin.envios.create')->only('create', 'store');
        $this->middleware('can:admin.envios.edit')->only('edit', 'update');
        $this->middleware('can:admin.envios.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $envios = Envio::with(['user', 'destinoR', 'destinoD'])->get();
        return view('admin.envios.index', compact('envios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tipoclientes = Tipocliente::all();
        $destinos = Destino::all();
        $envios = Envio::all();
        return view('admin.envios.create', compact('envios', 'destinos', 'tipoclientes'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {

        //validar los datos existentes...
        //dd($request->all());
        $validatedData = $request->validate([
            'envCodigo' => 'required|string|unique:envios,envCodigo|max:30',
            'envDescripcion' => 'required|string|max:255',
            'envFecha_Llegada' => 'required|date_format:d/m/Y',
            'envTotal' => 'required|numeric',
            'envPagoCon' => 'required|numeric',
            'envMetodoPago' => 'required|string',
            'ID_DestinoR' => 'required|exists:destinos,ID_Destino',
            'ID_DestinoD' => 'required|exists:destinos,ID_Destino',
            'paquetes' => 'required|array',
            'paquetes.*.paqCodigo' => 'required|string',
            'paquetes.*.paqDescripcion' => 'required|string',
            'paquetes.*.paqCantidad' => 'required|integer',
            'paquetes.*.paqPrecio' => 'required|numeric',
            'paquetes.*.paqPeso' => 'required|numeric',
            'paquetes.*.paqTamaño' => 'required|string',
            'cliRUCE' => 'required|string|unique:clientes,cliRUC',
            'cliRazonSocialE' => 'required|string',
            'cliEmailE' => 'required|string',
            'cliDireccionE' => 'required|regex:/^[a-zA-Z0-9\s\.,]+$/',
            'cliTelefonoE' => 'required|string',
            'ID_tpClienteE' => 'required|exists:tipoclientes,ID_tpCliente',
            'cliRUCR' => 'required|string|unique:clientes,cliRUC',
            'cliRazonSocialR' => 'required|string',
            'cliEmailR' => 'required|string',
            'cliDireccionR' => 'required|regex:/^[a-zA-Z0-9\s\.,]+$/',
            'cliTelefonoR' => 'required|string',
            'ID_tpClienteR' => 'required|exists:tipoclientes,ID_tpCliente',
        ]);

        // Convertir el formato de fecha al formato Y-m-d de Laravel
        $fechaLlegada = Carbon::createFromFormat('d/m/Y', $request->envFecha_Llegada)->format('Y-m-d');

        // Obtener el ID del usuario autenticado
        $userId = Auth::id();

        // Crear el envío
        $envio = Envio::create([
            'envCodigo' => $request->envCodigo,
            'envDescripcion' => $request->envDescripcion,
            'envFecha_Llegada' => $fechaLlegada,
            'envTotal' => $request->envTotal,
            'envPagoCon' => $request->envPagoCon,
            'envMetodoPago' => $request->envMetodoPago,
            'ID_DestinoR' => $request->ID_DestinoR,
            'ID_DestinoD' => $request->ID_DestinoD,
            'ID_User' => $userId,
        ]);

        if ($envio) {
            foreach ($validatedData['paquetes'] as $paquete) {
                Paquete::create([
                    'paqCodigo' => $paquete['paqCodigo'],
                    'paqDescripcion' => $paquete['paqDescripcion'],
                    'paqCantidad' => $paquete['paqCantidad'],
                    'paqPrecio' => $paquete['paqPrecio'],
                    'paqPeso' => $paquete['paqPeso'],
                    'paqTamaño' => $paquete['paqTamaño'],
                    'ID_Envio' => $envio->ID_Envio,
                ]);
            }
        }

        // Crear el cliente de salida
        $clienteSalida = Cliente::create([
            'cliRUC' => $request->cliRUCE,
            'cliRazonSocial' => $request->cliRazonSocialE,
            'cliEmail' => $request->cliEmailE,
            'cliDireccion' => $request->cliDireccionE,
            'cliTelefono' => $request->cliTelefonoE,
            'ID_tpCliente' => $request->ID_tpClienteE,
        ]);

        // Crear el cliente de llegada
        $clienteLlegada = Cliente::create([
            'cliRUC' => $request->cliRUCR,
            'cliRazonSocial' => $request->cliRazonSocialR,
            'cliEmail' => $request->cliEmailR,
            'cliDireccion' => $request->cliDireccionR,
            'cliTelefono' => $request->cliTelefonoR,
            'ID_tpCliente' => $request->ID_tpClienteR,
        ]);

        // Asociar clientes al envío en Enviocliente
        Enviocliente::create([
            'ecNombre' => 'Salida',
            'ID_Envio' => $envio->ID_Envio,
            'ID_Cliente' => $clienteSalida->ID_Cliente,
        ]);

        Enviocliente::create([
            'ecNombre' => 'Llegada',
            'ID_Envio' => $envio->ID_Envio,
            'ID_Cliente' => $clienteLlegada->ID_Cliente,
        ]);

        return redirect()->route('admin.envios.index')->with('success', 'Envio creado exitosamente.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $envios = Envio::find($id);

        return view('admin.envios.edit', compact('envios'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $envios = Envio::findOrFail($id);
        $request->validate([
            //
        ]);
        // Actualizar los atributos del empleado con los nuevos valores
        $envios->update($request->all());
        return redirect()->route('admin.envios.index')
            ->with('message', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $envios = Envio::find($id);

        if (!$envios) {
            return back()->with('message', 'Envio no encontrado');
        }

        $envios->delete();

        return back()->with('message', 'ok');
    }
}
