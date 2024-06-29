<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AI3Controller extends Controller
{
    public function index()
    {
        return view('admin.predicciones.pmv3');
    }

    public function predict(Request $request)
    {
        // Recibir los parámetros desde el formulario
        $num_envios = $request->input('num_envios');
        $total_monto_envios = $request->input('total_monto_envios');
        $dias_ultimo_envio = $request->input('dias_ultimo_envio');
        $number_of_complaints = $request->input('number_of_complaints');

        // Realizar la solicitud GET a la API con los parámetros proporcionados
        $response = Http::get('https://2069-35-243-172-170.ngrok-free.app/predict?', [
            'num_envios' => $num_envios,
            'total_monto_envios' => $total_monto_envios,
            'dias_ultimo_envio' => $dias_ultimo_envio,
            'number_of_complaints' => $number_of_complaints,
        ]);

        // Verificar si la solicitud fue exitosa y obtener los datos
        if ($response->successful()) {
            $data = $response->json(); // Convertir la respuesta JSON en un array asociativo
            return view('admin.predicciones.pmv3', ['data' => $data])->with('success', 'PREDICCIÓN EXITOSA!!');
        } else {
            return view('admin.predicciones.pmv3')->with('error', 'El servicio de predicción falló');
        }
    }
}
