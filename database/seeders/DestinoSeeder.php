<?php

namespace Database\Seeders;

use App\Models\Destino; // Asegúrate de importar el modelo Destino si aún no lo has hecho
use Illuminate\Database\Seeder;

class DestinoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Datos de ejemplo para los destinos
        $destinos = [
            [
                'desCodigo' => 'DST001',
                'desNombre' => 'Huancayo A',
                'desDescripcion' => 'Descripción del destino A',
                'desDireccion' => 'Dirección del destino A',
            ],
            [
                'desCodigo' => 'DST002',
                'desNombre' => 'San Ramon B',
                'desDescripcion' => 'Descripción del destino B',
                'desDireccion' => 'Dirección del destino B',
            ],
            [
                'desCodigo' => 'DST003',
                'desNombre' => 'Pichanaki C',
                'desDescripcion' => 'Descripción del destino C',
                'desDireccion' => 'Dirección del destino C',
            ],
            [
                'desCodigo' => 'DST004',
                'desNombre' => 'Ayacucho D',
                'desDescripcion' => 'Descripción del destino D',
                'desDireccion' => 'Dirección del destino D',
            ],
            [
                'desCodigo' => 'DST005',
                'desNombre' => 'Huancavelica E',
                'desDescripcion' => 'Descripción del destino E',
                'desDireccion' => 'Dirección del destino E',
            ],
            [
                'desCodigo' => 'DST006',
                'desNombre' => 'Ica F',
                'desDescripcion' => 'Descripción del destino F',
                'desDireccion' => 'Dirección del destino F',
            ],
            [
                'desCodigo' => 'DST007',
                'desNombre' => 'Azapampa G',
                'desDescripcion' => 'Descripción del destino G',
                'desDireccion' => 'Dirección del destino G',
            ],
            // Puedes agregar más datos de ejemplo aquí si lo deseas
        ];

        // Insertar los datos de ejemplo en la tabla de destinos
        foreach ($destinos as $destino) {
            Destino::create($destino);
        }
    }
}