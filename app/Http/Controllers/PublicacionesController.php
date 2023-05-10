<?php

namespace App\Http\Controllers;

use App\Http\Requests\PublicacionesRequest;
use Illuminate\Support\Facades\Http;
use Inertia\Inertia;

class PublicacionesController extends Controller
{
    public function index()
    {
        $ruta = asset('').'api/publicaciones';
        $publicaciones = Http::get($ruta)->json();
        return Inertia::render('Publicaciones/Index', [
            'publicaciones' => $publicaciones,
        ]);
    }

    public function create()
    {
        return Inertia::render('Publicaciones/Create');
    }


    public function store(PublicacionesRequest $request)
    {
        $ruta = asset('').'api/publicaciones';
        $publicacaiones = Http::post($ruta, $request->all())->json();
        return redirect('publicaciones');
    }


    public function edit(string $id)
    {
        $ruta = asset('').'api/publicaciones/'.$id;
        $publicacion = Http::get($ruta)->json();
        return Inertia::render('Publicaciones/Edit', [
            'publicacion' => $publicacion,
        ]);
    }


    public function update(PublicacionesRequest $request, string $id)
    {
        $ruta = asset('').'api/publicaciones/'.$id;
        $publicacaiones = Http::put($ruta, $request->all())->json();
        return redirect('publicaciones');
    }


    public function destroy(string $id)
    {
        $ruta = asset('').'api/publicaciones/'.$id;
        $publicacaiones = Http::delete($ruta)->json();
        return redirect('publicaciones');
    }
}
