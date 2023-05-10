<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Comentarios;

class Publicaciones extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'publicaciones';

    protected $fillable = ['titulo', 'contenido', 'autor', 'imagen'];

    public function comentarios()
    {
        return $this->hasMany(Comentarios::class, 'publicacion_id', 'id');
    }
}
