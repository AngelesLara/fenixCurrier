<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AI2Controller extends Controller
{
    public function index()
    {
        return view('admin.predicciones.pmv2');
    }

    public function predict(Request $request)
    {
        $fecha = $request->input('fecha');

        // Realizar la solicitud GET a la API con la fecha proporcionada
        $response = Http::get('https://a56f-34-125-110-47.ngrok-free.app/api/predict', [
            'fecha' => $fecha
        ]);

        // Verificar si la solicitud fue exitosa y obtener los datos
        if ($response->successful()) {
            $data = $response->json(); // Convertir la respuesta JSON en un array asociativo
            return view('admin.predicciones.pmv2', ['data' => $data])->with('success', 'PREDICCIÓN EXITOSA!!');
        } else {
            return view('admin.predicciones.pmv2')->with('error', 'El servicio de predicción falló');
        }
    }
}