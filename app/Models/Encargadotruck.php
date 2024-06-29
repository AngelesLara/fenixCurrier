<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Encargadotruck extends Model
{
    use HasFactory;

    protected $primaryKey = 'ID_EncargadoTruck';
    
    protected $fillable = [
        'etDescripcion', 'etEstado', 'ID_Camion', 'ID_Empleado'
    ];

    public function salidaenvio(){
        return $this->hasMany(Salidaenvio::class, 'ID_EncargadoTruck');
    }

    public function truck()
    {
        return $this->belongsTo(Truck::class, 'ID_Camion');
    }

    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'ID_Empleado');
    }
}
