<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Encargadotruck;
use App\Models\Truck;
use Illuminate\Http\Request;

class EncargadotruckController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('can:admin.encargadotrucks.index')->only('index');
        $this->middleware('can:admin.encargadotrucks.create')->only('create', 'store');
        $this->middleware('can:admin.encargadotrucks.edit')->only('edit', 'update');
        $this->middleware('can:admin.encargadotrucks.destroy')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $encargadotrucks = Encargadotruck::with('truck', 'empleado')->get();
        return view('admin.encargadotrucks.index', compact('encargadotrucks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Obtener solo empleados y camiones con estado = 1
        $empleados = Empleado::where('empEstado', 1)->get();
        $trucks = Truck::where('truEstado', 1)->get();
        $encargadotrucks = new Encargadotruck();
        return view('admin.encargadotrucks.create', compact('encargadotrucks', 'empleados', 'trucks'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validacion = $request->validate([
            'etDescripcion' => 'required|string',
            'ID_Camion' => 'required|integer',
            'ID_Empleado' => 'required|integer',
        ]);
        $encargadotrucks = Encargadotruck::create($request->all());

        // Cambiar el estado del camión y del empleado a 2
        $truck = Truck::find($request->ID_Camion);
        $empleado = Empleado::find($request->ID_Empleado);

        if ($truck && $empleado) {
            $truck->truEstado = 2;
            $truck->save();

            $empleado->empEstado = 2;
            $empleado->save();
        }

        return redirect()->route('admin.encargadotrucks.index')->with('success', 'Encargado del Transporte Creado Exitosamente.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Obtener encargado del camión que se está editando
        $encargadotrucks = Encargadotruck::findOrFail($id);

        // Obtener todos los empleados disponibles
        $empleadosDisponibles = Empleado::where('empEstado', 1)->get();

        // Obtener todos los camiones disponibles
        $trucksDisponibles = Truck::where('truEstado', 1)->get();

        // Obtener el empleado asignado
        $empleadoAsignado = $encargadotrucks->empleado;

        // Obtener el camión asignado
        $camionAsignado = $encargadotrucks->truck;

        return view('admin.encargadotrucks.edit', compact('encargadotrucks', 'empleadosDisponibles', 'trucksDisponibles', 'empleadoAsignado', 'camionAsignado'));
    }


    /*
    public function edit(string $id)
    {
        $empleados = Empleado::where('empEstado', 1)->get();
        $trucks = Truck::where('truEstado', 1)->get();
        $encargadotrucks = Encargadotruck::find($id);
        return view('admin.encargadotrucks.edit', compact('encargadotrucks', 'empleados', 'trucks'));
    }
*/


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $encargadotrucks = Encargadotruck::findOrFail($id);
        $request->validate([
            'etDescripcion' => 'required|string',
            'ID_Camion' => 'required|integer',
            'ID_Empleado' => 'required|integer',
        ]);

        // Verificar si hay un encargado actualmente asignado
        $encargadoActual = $encargadotrucks->empleado;

        // Actualizar los atributos del encargado de camión con los nuevos valores
        $encargadotrucks->update($request->all());

        // Cambiar el estado del encargado actual a 1 si es diferente al nuevo encargado seleccionado
        if ($encargadoActual && $encargadoActual->ID_Empleado != $request->ID_Empleado) {
            $encargadoActual->empEstado = 1;
            $encargadoActual->save();
        }

        // Cambiar el estado del nuevo empleado a 2
        $nuevoEmpleado = Empleado::find($request->ID_Empleado);
        if ($nuevoEmpleado) {
            $nuevoEmpleado->empEstado = 2;
            $nuevoEmpleado->save();
        }

        // Cambiar el estado del camión actual a 1 si es diferente al nuevo camión seleccionado
        $camionActual = $encargadotrucks->truck;
        if ($camionActual && $camionActual->ID_Camion != $request->ID_Camion) {
            $camionActual->truEstado = 1;
            $camionActual->save();
        }

        // Cambiar el estado del nuevo camión a 2
        $nuevoCamion = Truck::find($request->ID_Camion);
        if ($nuevoCamion) {
            $nuevoCamion->truEstado = 2;
            $nuevoCamion->save();
        }

        return redirect()->route('admin.encargadotrucks.index')->with('success', 'Encargado del Transporte Actualizado Exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $encargadotrucks = Encargadotruck::find($id);

        if ($encargadotrucks) {
            $truck = Truck::find($encargadotrucks->ID_Camion);
            $empleado = Empleado::find($encargadotrucks->ID_Empleado);

            // Eliminar el encargado del camión
            $encargadotrucks->delete();

            // Cambiar el estado del camión y del empleado a 1
            if ($truck && $empleado) {
                $truck->truEstado = 1;
                $truck->save();

                $empleado->empEstado = 1;
                $empleado->save();
            }
        }

        return redirect()->route('admin.encargadotrucks.index')->with('success', 'Encargado del Transporte Eliminado Exitosamente.');
    }
}
