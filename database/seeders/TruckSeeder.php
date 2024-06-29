<?php

namespace Database\Seeders;

use App\Models\Truck;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TruckSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $camiones = [
            [
                'truPlaca' => 'WFC-B87',
                'truSOAT' => '21395113',
                'truMarca' => 'Toyota',
                'truCapacidadPeso' => '1 Tonelada',
            ],
            [
                'truPlaca' => 'XMF-342',
                'truSOAT' => '28675423',
                'truMarca' => 'Toyota',
                'truCapacidadPeso' => '1 Tonelada',
            ],
            [
                'truPlaca' => 'VED-402',
                'truSOAT' => '23675423',
                'truMarca' => 'Toyota',
                'truCapacidadPeso' => '1 Tonelada',
            ],
            [
                'truPlaca' => 'AWF-A56',
                'truSOAT' => '21675423',
                'truMarca' => 'Toyota',
                'truCapacidadPeso' => '1 Tonelada',
            ],
            [
                'truPlaca' => 'BFG-3ZV',
                'truSOAT' => '22215423',
                'truMarca' => 'Toyota',
                'truCapacidadPeso' => '1 Tonelada',
            ],
            [
                'truPlaca' => 'XCA-2AB',
                'truSOAT' => '26125423',
                'truMarca' => 'Toyota',
                'truCapacidadPeso' => '1 Tonelada',
            ],
            [
                'truPlaca' => 'FEX-1AA',
                'truSOAT' => '21985423',
                'truMarca' => 'Toyota',
                'truCapacidadPeso' => '1 Tonelada',
            ],
            // Puedes agregar más datos de ejemplo aquí si lo deseas
        ];

        // Insertar los datos de ejemplo en la tabla de camiones
        foreach ($camiones as $camion) {
            Truck::create($camion);
        }
    }
}
