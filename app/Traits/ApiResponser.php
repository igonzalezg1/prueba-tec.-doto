<?php

namespace App\Traits;

//Collection: Sirve para manejar colecciones de datos (parametros que entran a un metodo)
use Illuminate\Support\Collection;
//Response: Sirve para manejar respuestas de la API (no lo ocuparemos aun)
//use Illuminate\Http\Response;
//Model: Sirve para manejar modelos de datos (parametros que entran a un metodo)
use Illuminate\Database\Eloquent\Model;

trait ApiResponser
{
    //Respuestas de exito
    protected function successResponse($data, $code)
    {
        //De la data que recibe, la convierte en un json agregando el codigo de respuesta
        return response()->json($data, $code);
    }

    //Respuestas de error
    protected function errorResponse($mesage, $code)
    {
        //De la data que recibe, la convierte en un json agregando el codigo de respuesta
        return response()->json(['error' => $mesage, 'code' => $code], $code);
    }

    //Mostrar una coleccion de datos
    protected function getAllData(Collection $collection, $code = 200)
    {
        //Si la coleccion esta vacia
        if ($collection->isEmpty()) {
            //Retorna un mensaje de error
            return $this->errorResponse('No se encontraron instancias con esos parametros', 404);
        }

        //Si no esta vacia, retorna la coleccion
        return $this->successResponse($collection, $code);
    }

    //Mostrar un modelo de datos
    protected function getOneData(Model $instance, $code = 200)
    {
        //Si la instancia esta vacia
        if (empty($instance)) {
            //Retorna un mensaje de error
            return $this->errorResponse('No se encontro ninguna instancia con ese identificador', 404);
        }
        //Si no esta vacia, retorna la instancia
        return $this->successResponse($instance, $code);
    }

    //Mostrar un mensaje
    protected function showMessage($mesage, $code = 200)
    {
        //Retorna el mensaje
        return $this->successResponse($mesage, $code);
    }
}
