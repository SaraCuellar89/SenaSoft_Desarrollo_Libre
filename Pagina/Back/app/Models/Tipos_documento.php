<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has;

class Tipos_documento extends Model
{
    use HasFactory;

    protected $table = "tipos_documentos";

    protected $fillable = [
        "tipo"
    ];

    protected $hidden = [
        "created_at",
        "updated_at",
    ];
}
