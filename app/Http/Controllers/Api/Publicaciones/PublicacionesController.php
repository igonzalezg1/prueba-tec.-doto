<?php

namespace App\Http\Controllers\Api\Publicaciones;

use App\Http\Controllers\ApiController;
use App\Http\Requests\PublicacionesRequest;
use App\Models\Publicaciones;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

//Extendemos de ApiController para usar ApiResponser
class PublicacionesController extends ApiController
{
    //Usamos ApiResponser para hacer formato universal de respuestas
    public function index()
    {
        $publicaciones = Publicaciones::all();
        return $this->getAllData($publicaciones);
    }

    //Usamos PublicacionesRequest para validar los datos de entrada
    public function store(PublicacionesRequest $request)
    {
        //Hacemos uso de transacciones para evitar errores
        DB::beginTransaction();
        try {
            //Subir la imagen al servidor
            if ($request->hasFile('imagen')) {
                $path = $request->file('imagen')->store('public/evidencias');
                $publicacionData = $request->all();
                $publicacionData['imagen'] = $path;
            }else
            {
                $publicacionData = $request->except('imagen');
            }
            $publicacion = Publicaciones::create($publicacionData);
            DB::commit();
            return $this->successResponse($publicacion, 201);
        } catch (\Exception $e) {
            DB::rollback();
            return $this->errorResponse($e->getMessage(), 500);
        }
    }

    //Hacemos uso de Route Model Binding para obtener el modelo
    public function show($id)
    {
        $publicacion = Publicaciones::findOrFail($id);
        return $this->getOneData($publicacion);
    }

    //Usamos PublicacionesRequest para validar los datos de entrada y Route Model Binding para obtener el modelo
    public function update(PublicacionesRequest $request,$id)
    {
        $publicaciones = Publicaciones::findOrFail($id);
        //Hacemos uso de transacciones para evitar errores
        DB::beginTransaction();
        try {
            //Subir la imagen al servidor
            if ($request->hasFile('imagen')) {
                Storage::delete($publicaciones->imagen);
                $path = $request->file('imagen')->store('public/evidencias');
                $publicacionData = $request->all();
                $publicacionData['imagen'] = $path;
            } else {
                $publicacionData = $request->except('imagen');
            }
            $publicacion = $publicaciones->update($publicacionData);
            DB::commit();
            return $this->getOneData($publicaciones);
        } catch (\Exception $e) {
            DB::rollback();
            return $this->errorResponse($e->getMessage(), 500);
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $publicacion = Publicaciones::findOrFail($id);
            $publicacion->delete();
            DB::commit();
            return $this->successResponse($publicacion, 200);
        } catch (\Exception $e) {
            DB::rollback();
            return $this->errorResponse($e->getMessage(), 500);
        }
    }
}
