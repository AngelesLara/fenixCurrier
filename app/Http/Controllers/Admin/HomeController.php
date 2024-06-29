<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use App\Models\Destino;
use App\Models\Empleado;
use App\Models\Encargadotruck;
use App\Models\Envio;
use App\Models\Paquete;
use App\Models\Salida;
use App\Models\Truck;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $totales = [
            'trucks' => Truck::count(),
            'empleados' => Empleado::count(),
            'encargados' => Encargadotruck::count(),
            'destinos' => Destino::count(),
            'paquetes' => Paquete::count(),
            'envios' => Envio::count(),
            'clientes' => Cliente::count(),
            'salidas' => Salida::count(),
        ];

        return view('admin.index', compact('totales'));
    }
}
