<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avion extends Model
{
    use HasFactory;

    protected $table = 'avions';

    protected $fillable = [
        'nombre',
        'modelo',
        'aerolina',
        'capacidad',
    ];

    protected $hidden = [
        "created_at",
        "updated_at",
    ];

    public function vuelos()
    {
        return $this->hasMany(Vuelos::class, "avion_id");
    }
}
