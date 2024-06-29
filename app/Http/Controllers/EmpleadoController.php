<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EmpleadoController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:admin.empleados.index')->only('index');
        $this->middleware('can:admin.empleados.create')->only('create', 'store');
        $this->middleware('can:admin.empleados.edit')->only('edit', 'update');
        $this->middleware('can:admin.empleados.destroy')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empleados = Empleado::all();
        return view('admin.empleados.index', compact('empleados'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $empleados = new Empleado();
        return view('admin.empleados.create', compact('empleados'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validacion = $request->validate([
            'empCodigo' => 'required|unique:empleados',
            'empNombre' => 'required',
            'empTelefono' => 'required',
            'empEmail' => 'required|email',
            'empDireccion' => 'required|regex:/^[a-zA-Z0-9\s\.,]+$/',
            'empCargo' => 'required',
            'empSueldo' => 'required',
        ]);
        $empleados = Empleado::create($request->all());

        return redirect()->route('admin.empleados.index')->with('success', 'Empleado Creado Exitosamente.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $empleados = Empleado::find($id);

        return view('admin.empleados.edit', compact('empleados'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $empleado = Empleado::findOrFail($id);
        $request->validate([
            'empCodigo' => ['required', Rule::unique('empleados')->ignore($empleado)],
            'empNombre' => 'required',
            'empTelefono' => 'required',
            'empEmail' => 'required|email',
            'empDireccion' => 'required|regex:/^[a-zA-Z0-9\s\.,]+$/',
            'empCargo' => 'required',
            'empSueldo' => 'required',
        ]);
        // Actualizar los atributos del empleado con los nuevos valores
        $empleado->update($request->all());
        return redirect()->route('admin.empleados.index')->with('success', 'Empleado Actualizado Exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $empleados = Empleado::find($id);

        if (!$empleados) {
            return back()->with('message', 'Empleado no encontrado');
        }

        $empleados->delete();

        return back()->with('success', 'Empleado Eliminado Exitosamente.');
    }
}
