<?php

namespace App\Http\Controllers\Api\Publicaciones;

use App\Http\Controllers\ApiController;
use App\Models\Comentarios;
use App\Models\Publicaciones;

class PublicacionesComentariosController extends ApiController
{
    public function index($id)
    {
        $publicacion = Publicaciones::findOrFail($id);
        $comentarios = $publicacion->comentarios;

        return $this->getAllData($comentarios);
    }
}
