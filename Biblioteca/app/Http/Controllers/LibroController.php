<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class LibroController extends Controller

{
   public function index()
   {
    $libros = Libro::orderBy('id')->get();
    return view('libros.index', compact('libros'));
   }

   public function create()
   {
    return view('libros.create');
   }

   public function store(Request $request)
   {

    $datos = $request->validate([
        'codigo' => ['required', 'string', 'unique:libros,codigo'],
        'titulo' => ['required', 'string', 'max:150'],
        'autor' => ['required', 'string', 'max:100'],
        'anio_publicacion' => [
            'required',
            'integer',
            'between:1450,' . date('Y'),
        ],
    ]);

    $libro = new Libro();
    $libro->codigo = $datos['codigo'];
    $libro->titulo = $datos['titulo'];
    $libro->autor = $datos['autor'];
    $libro->anio_publicacion = $datos['anio_publicacion'];

    $libro->save();

    return redirect()->route('libros.index')->with('success', 'Libro creado exitosamente.');
   }

   public function edit(int $id)
   {
    $libro = Libro::findOrFail($id);
    return view('libros.edit', compact('libro'));
   }

   public function update(Request $request, int $id)
   {
    $libro = Libro::findOrFail($id);

    $datos = $request->validate([
        'codigo' => ['required', 'string', Rule::unique('libros')->ignore($libro->id)],
        'titulo' => ['required', 'string', 'max:150'],
        'autor' => ['required', 'string', 'max:100'],
        'anio_publicacion' => [
            'required',
            'integer',
            'between:1450,' . date('Y'),
        ],
    ]);

    $libro->codigo = $datos['codigo'];
    $libro->titulo = $datos['titulo'];
    $libro->autor = $datos['autor'];
    $libro->anio_publicacion = $datos['anio_publicacion'];

    $libro->save();

    return redirect()->route('libros.index')->with('success', 'Libro actualizado exitosamente.');
   }
}
