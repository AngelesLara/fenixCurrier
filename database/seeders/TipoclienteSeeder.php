<?php

namespace Database\Seeders;

use App\Models\TipoCliente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoclienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TipoCliente::insert([
            [
                'tpcNombre' => 'natural'
            ],
            [
                'tpcNombre' => 'jurídica'
            ]
        ]);
    }
}
