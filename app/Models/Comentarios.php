<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Publicaciones;

class Comentarios extends Model
{
    use HasFactory, softDeletes;

    protected $table = 'comentarios';

    protected $fillable = [
        'autor',
        'correo',
        'contenido',
        'publicacion_id',
    ];

    public function publicacion()
    {
        return $this->belongsTo(Publicaciones::class, 'publicacion_id', 'id');
    }
}
