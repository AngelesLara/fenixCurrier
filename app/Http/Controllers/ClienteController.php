<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Tipocliente;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ClienteController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:admin.clientes.index')->only('index');
        $this->middleware('can:admin.clientes.create')->only('create', 'store');
        $this->middleware('can:admin.clientes.edit')->only('edit', 'update');
        $this->middleware('can:admin.clientes.destroy')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $clientes = Cliente::with('tipocliente')->get();
        return view('admin.clientes.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tipoclientes = Tipocliente::all();
        return view('admin.clientes.create', compact('tipoclientes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validacion = $request->validate([
            'cliRUC' => 'required|unique:clientes,cliRUC',
            'cliRazonSocial' => 'required',
            'cliEmail' => 'required',
            'cliDireccion' => 'required|regex:/^[a-zA-Z0-9\s\.,]+$/',
            'cliTelefono' => 'required',
            'ID_tpCliente' => 'required',
        ]);
        $clientes = Cliente::create($request->all());

        return redirect()->route('admin.clientes.index')->with('success', 'Cliente Creado Exitosamente.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tipoclientes = Tipocliente::all();
        $clientes = Cliente::find($id);
        return view('admin.clientes.edit', compact('clientes', 'tipoclientes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $cliente = Cliente::findOrFail($id);
        $request->validate([
            'cliRUC' => ['required', Rule::unique('clientes')->ignore($cliente)],
            'cliRazonSocial' => 'required',
            'cliEmail' => 'required',
            'cliDireccion' => 'required|regex:/^[a-zA-Z0-9\s\.,]+$/',
            'cliTelefono' => 'required',
            'ID_tpCliente' => 'required',
        ]);
        // Actualizar los atributos del empleado con los nuevos valores
        $cliente->update($request->all());
        return redirect()->route('admin.clientes.index')->with('success', 'Cliente Actualizado Exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cliente = Cliente::find($id);

        if (!$cliente) {
            return back()->with('message', 'Cliente no encontrado');
        }

        $cliente->delete();

        return back()->with('success', 'Cliente Eliminado Exitosamente.');
    }
}
