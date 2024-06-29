<?php

namespace App\Http\Controllers;

use App\Models\Truck;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TruckController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('can:admin.trucks.index')->only('index');
        $this->middleware('can:admin.trucks.create')->only('create', 'store');
        $this->middleware('can:admin.trucks.edit')->only('edit', 'update');
        $this->middleware('can:admin.trucks.destroy')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trucks = Truck::all();
        return view('admin.trucks.index', compact('trucks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $trucks = new Truck();
        return view('admin.trucks.create', compact('trucks'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validacion = $request->validate([
            'truPlaca' => 'required|unique:trucks',
            'truSOAT' => 'required',
            'truMarca' => 'required',
            'truCapacidadPeso' => 'required',
        ]);
        $trucks = Truck::create($request->all());

        return redirect()->route('admin.trucks.index')->with('success', 'Camión Creado Exitosamente.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $trucks = Truck::find($id);

        return view('admin.trucks.edit', compact('trucks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $trucks = Truck::findOrFail($id);
        $request->validate([
            'truPlaca' => ['required', Rule::unique('trucks')->ignore($trucks)],
            'truSOAT' => 'required',
            'truMarca' => 'required',
            'truCapacidadPeso' => 'required',
        ]);
        // Actualizar los atributos del empleado con los nuevos valores
        $trucks->update($request->all());
        return redirect()->route('admin.trucks.index')->with('success', 'Camión Actualizado Exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $trucks = Truck::find($id);

        if (!$trucks) {
            return back()->with('message', 'Camión no encontrado');
        }

        $trucks->delete();

        return back()->with('success', 'Camión se Elimino Exitosamente.');
    }
}
