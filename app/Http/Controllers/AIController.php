<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AIController extends Controller
{

    public function index()
    {
        return view('admin.predicciones.pmv1');
    }

    public function predict(Request $request)
    {
        $fecha = $request->input('fecha');

        // Realizar la solicitud GET a la API con la fecha proporcionada
        $response = Http::get('https://88b5-34-48-99-215.ngrok-free.app/api/predict', [
            'fecha' => $fecha
        ]);

        // Verificar si la solicitud fue exitosa y obtener los datos
        if ($response->successful()) {
            $data = $response->json(); // Convertir la respuesta JSON en un array asociativo
            return view('admin.predicciones.pmv1', ['data' => $data])->with('success','');
        } else {
            return view('admin.predicciones.pmv1')->with('error', 'Prediction service failed');
        }
    }
}
