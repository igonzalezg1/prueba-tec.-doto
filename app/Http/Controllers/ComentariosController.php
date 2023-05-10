<?php

namespace App\Http\Controllers;

use App\Http\Requests\ComentariosRequest;
use Illuminate\Support\Facades\Http;
use Inertia\Inertia;

class ComentariosController extends Controller
{
    public function index()
    {
        $ruta = asset('').'api/comentarios';
        $comentarios = Http::get($ruta)->json();
        return Inertia::render('Comentarios/Index', [
            'comentarios' => $comentarios,
        ]);
    }


    public function create()
    {
        $options = Http::get(asset('').'api/publicaciones')->json();
        return Inertia::render('Comentarios/Create', [
            'options' => $options,
        ]);
    }

    public function store(ComentariosRequest $request)
    {
        $ruta = asset('').'api/comentarios';
        $comentarios = Http::post($ruta, $request->all())->json();
        return redirect('comentarios');
    }

    public function edit(string $id)
    {
        $ruta = asset('').'api/comentarios/'.$id;
        $comentarios = Http::get($ruta)->json();
        $options = Http::get(asset('').'api/publicaciones')->json();
        return Inertia::render('Comentarios/Edit', [
            'comentarios' => $comentarios,
            'options' => $options,
        ]);
    }

    public function update(ComentariosRequest $request, string $id)
    {
        $ruta = asset('').'api/comentarios/'.$id;
        $comentarios = Http::put($ruta, $request->all())->json();
        return redirect('comentarios');
    }

    public function destroy(string $id)
    {
        $ruta = asset('').'api/comentarios/'.$id;
        $comentarios = Http::delete($ruta)->json();
        return redirect('comentarios');
    }
}
