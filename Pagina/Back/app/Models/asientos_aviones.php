<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class asientos_aviones extends Model
{
    use HasFactory;

    protected $hidden = [
        "created_at",
        "updated_at",
    ];
}
