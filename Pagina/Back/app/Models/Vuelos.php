<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vuelos extends Model
{
    use HasFactory;

    protected $table = 'vuelos';

    protected $fillable = [
        'avion_id',
        'image',
        'origen',
        'destino',
        'fecha_salida',
        'fecha_llegada',
        'tipo_vuelo',
        'precio'
    ];

    protected $hidden = [
        "created_at",
        "updated_at",
    ];

    public function avions()
    {
        return $this->belongsTo(Avion::class);
    }

    public function reserva()
    {
        return $this->hasMany(Reserva::class, "vuelo_id");
    }
    
}
