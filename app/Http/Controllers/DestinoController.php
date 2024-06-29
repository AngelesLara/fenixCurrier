<?php

namespace App\Http\Controllers;

use App\Models\Destino;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DestinoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('can:admin.destinos.index')->only('index');
        $this->middleware('can:admin.destinos.create')->only('create', 'store');
        $this->middleware('can:admin.destinos.edit')->only('edit', 'update');
        $this->middleware('can:admin.destinos.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $destinos = Destino::all();
        return view('admin.destinos.index', compact('destinos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $destinos = new Destino();
        return view('admin.destinos.create', compact('destinos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validacion = $request->validate([
            'desCodigo' => 'required|unique:destinos',
            'desNombre' => 'required|string',
            'desDescripcion' => 'required|regex:/^[a-zA-Z0-9\s\.,]+$/',
            'desDireccion' => 'required|regex:/^[a-zA-Z0-9\s\.,]+$/',
        ]);
        $destinos = Destino::create($request->all());

        return redirect()->route('admin.destinos.index')->with('success', 'Destino creado Existosamente...');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $destinos = Destino::find($id);

        return view('admin.destinos.edit', compact('destinos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $destinos = Destino::findOrFail($id);
        $request->validate([
            'desCodigo' => ['required', Rule::unique('destinos')->ignore($destinos)],
            'desNombre' => 'required|string',
            'desDescripcion' => 'required|regex:/^[a-zA-Z0-9\s\.,]+$/',
            'desDireccion' => 'required|regex:/^[a-zA-Z0-9\s\.,]+$/',
        ]);
        // Actualizar los atributos del empleado con los nuevos valores
        $destinos->update($request->all());
        return redirect()->route('admin.destinos.index')->with('success', 'Destino Actualizado Existosamente...');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $destinos = Destino::find($id);

        if (!$destinos) {
            return back()->with('message', 'Destino no encontrado');
        }

        $destinos->delete();

        return back()->with('success', 'Destino eliminado Existosamente...');
    }
}
