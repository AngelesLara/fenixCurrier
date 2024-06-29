<?php

namespace App\Http\Controllers;

use App\Models\Envio;
use App\Models\Paquete;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class PaqueteController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:admin.paquetes.index')->only('index');
        $this->middleware('can:admin.paquetes.create')->only('create', 'store');
        $this->middleware('can:admin.paquetes.edit')->only('edit', 'update');
        $this->middleware('can:admin.paquetes.destroy')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paquetes = Paquete::all();
        return view('admin.paquetes.index', compact('paquetes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $envios = Envio::all();
        $paquete = new Paquete(); // Cambiado a $paquete para evitar confusión con la variable $paquetes
        return view('admin.paquetes.create', compact('paquete', 'envios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validacion = $request->validate([
            'paqCodigo' => 'required|unique:paquetes',
            'paqDescripcion' => 'required|string',
            'paqPrecio' => 'required',
            'paqPeso' => 'required',
            'paqTamaño' => 'required',
        ]);

        Paquete::create([
            'paqCodigo' => $request->paqCodigo, // Corregido de 'codigo' a 'paqCodigo'
            'paqDescripcion' => $request->paqDescripcion, // Corregido de 'producto' a 'paqDescripcion'
            'paqPrecio' => $request->paqPrecio, // Corregido de 'precio_compra' a 'paqPrecio'
            'paqPeso' => $request->paqPeso, // Corregido de 'precio_venta' a 'paqPeso'
            'paqTamaño' => $request->paqTamaño, // Corregido de 'stock' a 'paqTamaño'
        ]);

        return redirect()->route('admin.paquetes.index')->with('message', 'ok');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $paquete = Paquete::findOrFail($id);
        return view('admin.paquetes.edit', compact('paquete'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $paquete = Paquete::findOrFail($id);

        $request->validate([
            'paqCodigo' => ['required', Rule::unique('paquetes')->ignore($paquete)],
            'paqDescripcion' => 'required|regex:/^[a-zA-Z0-9\s\.,]+$/',
            'paqPrecio' => 'required',
            'paqPeso' => 'required',
            'paqTamaño' => 'required|string',
        ]);

        $paquete->update([
            'paqCodigo' => $request->paqCodigo,
            'paqDescripcion' => $request->paqDescripcion,
            'paqPrecio' => $request->paqPrecio,
            'paqPeso' => $request->paqPeso,
            'paqTamaño' => $request->paqTamaño,
        ]);

        return redirect()->route('admin.paquetes.index')->with('message', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $paquete = Paquete::findOrFail($id);

        if (!$paquete) {
            return back()->with('message', 'Paquete no encontrado');
        }

        if ($paquete->paqImagen) {
            Storage::disk('public')->delete($paquete->paqImagen);
        }

        $paquete->delete();

        return redirect()->route('admin.paquetes.index')->with('message', 'ok');
    }
}
