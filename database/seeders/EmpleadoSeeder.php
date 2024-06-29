<?php

namespace Database\Seeders;

use App\Models\Empleado;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmpleadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Datos de ejemplo para los empleados
        $empleados = [
            [
                'empCodigo' => 'EMP001',
                'empNombre' => 'Juan Perez',
                'empTelefono' => '123456789',
                'empEmail' => 'juan@example.com',
                'empDireccion' => 'Calle Falsa 321',
                'empCargo' => 'transportista',
                'empSueldo' => 1800.00,
            ],
            [
                'empCodigo' => 'EMP002',
                'empNombre' => 'María Lopez',
                'empTelefono' => '987654321',
                'empEmail' => 'maria@example.com',
                'empDireccion' => 'Avenida Falsa 6H4',
                'empCargo' => 'transportista',
                'empSueldo' => 1800.00,
            ],
            [
                'empCodigo' => 'EMP003',
                'empNombre' => 'keysi Lopez',
                'empTelefono' => '987654321',
                'empEmail' => 'keysi@example.com',
                'empDireccion' => 'Avenida Falsa 4K3',
                'empCargo' => 'transportista',
                'empSueldo' => 1800.00,
            ],
            [
                'empCodigo' => 'EMP004',
                'empNombre' => 'Juan Jorge',
                'empTelefono' => '987654321',
                'empEmail' => 'jjorge@example.com',
                'empDireccion' => 'Avenida Falsa K4C',
                'empCargo' => 'transportista',
                'empSueldo' => 1800.00,
            ],
            [
                'empCodigo' => 'EMP005',
                'empNombre' => 'Talh Zapata',
                'empTelefono' => '987654321',
                'empEmail' => 'tzapata@example.com',
                'empDireccion' => 'Avenida Falsa JKC',
                'empCargo' => 'transportista',
                'empSueldo' => 1800.00,
            ],
            [
                'empCodigo' => 'EMP006',
                'empNombre' => 'Gian Pieers',
                'empTelefono' => '987654321',
                'empEmail' => 'gpieers@example.com',
                'empDireccion' => 'Avenida Falsa ABC',
                'empCargo' => 'transportista',
                'empSueldo' => 1800.00,
            ],
            [
                'empCodigo' => 'EMP007',
                'empNombre' => 'María Lopez',
                'empTelefono' => '987654321',
                'empEmail' => 'maria@example.com',
                'empDireccion' => 'Avenida Falsa XYZ',
                'empCargo' => 'transportista',
                'empSueldo' => 1800.00,
            ],
            // Puedes agregar más datos de ejemplo aquí si lo deseas
        ];

        // Insertar los datos de ejemplo en la tabla de empleados
        foreach ($empleados as $empleado) {
            Empleado::create($empleado);
        }
    }
}
