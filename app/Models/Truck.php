<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Truck extends Model
{
    use HasFactory;

    protected $primaryKey = 'ID_Camion';

    protected $fillable = [
        'truPlaca', 'truSOAT', 'truMarca', 'truCapacidadPeso', 'truEstado'
    ];

    public function empleados()
    {
        return $this->belongsToMany(Empleado::class)->withTimestamps()->withPivot('etDescripcion', 'etEstado');
    }  
}
