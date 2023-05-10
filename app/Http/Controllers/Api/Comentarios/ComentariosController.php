<?php

namespace App\Http\Controllers\Api\Comentarios;

use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ComentariosRequest;
use App\Models\Comentarios;

//Extendemos de ApiController para usar ApiResponser

//Modificanos el archivo app\Exceptions\Handler.php para respuestas predefinidas de error en formato JSON
class ComentariosController extends ApiController
{
    //Usamos ApiResponser para hacer formato universal de respuestas
    public function index()
    {
        $comentarios = Comentarios::all();
        return $this->getAllData($comentarios);
    }

    //Usamos ComentariosRequest para validar los datos de entrada
    public function store(ComentariosRequest $request)
    {
        $datos = $request->all();
        //Hacemos uso de transacciones para evitar errores
        DB::beginTransaction();
        try {
            $comentario = Comentarios::create([
                'autor' => $datos['autor'],
                'correo' => $datos['email'],
                'contenido' => $datos['contenido'],
                'publicacion_id' => $datos['publicacion_id'],
            ]);
            DB::commit();
            return $this->successResponse($comentario, 201);
        } catch (\Exception $e) {
            DB::rollback();
            return $this->errorResponse($e->getMessage(), 500);
        }
    }

    public function show($id)
    {
        $comentario = Comentarios::findOrFail($id);
        return $this->getOneData($comentario);
    }

    //Usamos ComentariosRequest para validar los datos de entrada
    public function update(ComentariosRequest $request, $id)
    {
        $comentario = Comentarios::findOrFail($id);
        $datos = $request->all();
        //Hacemos uso de transacciones para evitar errores
        DB::beginTransaction();
        try {
            $comentario->update([
                'autor' => $datos['autor'],
                'correo' => $datos['email'],
                'contenido' => $datos['contenido'],
                'publicacion_id' => $datos['publicacion_id'],
            ]);
            DB::commit();
            return $this->getOneData($comentario);
        } catch (\Exception $e) {
            DB::rollback();
            return $this->errorResponse($e->getMessage(), 500);
        }
    }

    //Hacemos uso de Route Model Binding para obtener el modelo
    public function destroy(Comentarios $comentario)
    {
        //Hacemos uso de transacciones para evitar errores
        DB::beginTransaction();
        try {
            $comentario->delete();
            DB::commit();
            return $this->successResponse($comentario, 200);
        } catch (\Exception $e) {
            DB::rollback();
            return $this->errorResponse($e->getMessage(), 500);
        }
    }
}
