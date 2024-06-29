<?php

namespace App\Http\Controllers;

use App\Models\Encargadotruck;
use App\Models\Envio;
use App\Models\Salida;
use Illuminate\Http\Request;

class SalidaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $salidas = Salida::with('encargadotruck')->get();
        return view('admin.salidas.index', compact('salidas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $envios = Envio::where('envEstado', 1)->get();
        $encargadotrucks = Encargadotruck::where('etEstado', 1)->get();

        return view('admin.salidas.create', compact('envios', 'encargadotrucks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'seHoraSalida' => 'required|date',
            'ID_EncargadoTruck' => 'required|integer',
            'envios' => 'required|array',
            'envios.*' => 'integer',
        ]);

        // Crear la nueva salida
        $salida = Salida::create($request->only(['seHoraSalida', 'ID_EncargadoTruck']));

        // Asignar envíos a la salida y actualizar el estado de los envíos
        $envios = $request->envios;
        $salida->envios()->attach($envios);

        // Actualizar el estado de cada envío asignado
        Envio::whereIn('ID_Envio', $envios)->update(['envEstado' => 2]);

        // Actualizar el estado del encargado del camión
        Encargadotruck::where('ID_EncargadoTruck', $request->ID_EncargadoTruck)->update(['etEstado' => 2]);

        return redirect()->route('admin.salidas.index')->with('success', 'Salida creada exitosamente.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $salidas = Salida::findOrFail($id);
        $envios = Envio::where('envEstado', 1)->get();
        $enviosDisponibles = Envio::where('envEstado', 1)->get();
        $encargadotrucks = Encargadotruck::where('etEstado', 1)->get();
        $selectedEnvios = $salidas->envios()->pluck('envios.ID_Envio')->toArray();
        // Obtener el encargado de camiones asociado a la salida
        $encargadotruckAsociado = $salidas->encargadotruck;

        return view('admin.salidas.edit', compact('salidas', 'envios', 'encargadotrucks', 'selectedEnvios', 'enviosDisponibles', 'encargadotruckAsociado'));
    }

    public function removeEnvio(Request $request, $id)
    {
        $salidas = Salida::findOrFail($id);
        $envioId = $request->input('envio_id');

        // Eliminar el envío de la salida
        $salidas->envios()->detach($envioId);

        // Actualizar el estado del envío a disponible (estado 1)
        Envio::where('ID_Envio', $envioId)->update(['envEstado' => 1]);

        return back()->with('success', 'Envío eliminado correctamente.');
    }

    public function addEnvio(Request $request, $id)
    {
        $salidas = Salida::findOrFail($id);
        $envioId = $request->input('envio_id');

        // Añadir el envío a la salida
        $salidas->envios()->attach($envioId);

        // Actualizar el estado del envío a asignado (estado 2)
        Envio::where('ID_Envio', $envioId)->update(['envEstado' => 2]);

        return back()->with('success', 'Envío agregado correctamente.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'seHoraSalida' => 'required|date',
            'ID_EncargadoTruck' => 'required|integer',
        ]);

        $salida = Salida::findOrFail($id);
        $encargadoTruckId = $salida->ID_EncargadoTruck;

        // Actualizar la salida
        $salida->update($request->only(['seHoraSalida', 'ID_EncargadoTruck']));

        // Actualizar el estado del encargado de camiones anterior a 1 si es diferente al nuevo encargado seleccionado
        if ($encargadoTruckId != $request->ID_EncargadoTruck) {
            Encargadotruck::where('ID_EncargadoTruck', $encargadoTruckId)->update(['etEstado' => 1]);
        }

        // Actualizar el estado del nuevo encargado de camiones a 2
        Encargadotruck::where('ID_EncargadoTruck', $request->ID_EncargadoTruck)->update(['etEstado' => 2]);

        return redirect()->route('admin.salidas.index')->with('success', 'Salida actualizada exitosamente.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $salida = Salida::findOrFail($id);

        // Obtener los IDs de los envíos y el ID del encargado
        $enviosIds = $salida->envios()->pluck('envios.ID_Envio')->toArray();
        $encargadoTruckId = $salida->ID_EncargadoTruck;

        // Actualizar el estado de los envíos a 1
        Envio::whereIn('ID_Envio', $enviosIds)->update(['envEstado' => 1]);

        // Actualizar el estado del encargado a 1
        if ($encargadoTruckId) {
            Encargadotruck::where('ID_EncargadoTruck', $encargadoTruckId)->update(['etEstado' => 1]);
        }

        // Eliminar la salida
        $salida->delete();

        return redirect()->route('admin.salidas.index')->with('success', 'Salida eliminada exitosamente.');
    }
}
