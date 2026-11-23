<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::orderBy('id')->get();
        return view('productos.index', [
            'productos' => $productos
        ]);
    }

    public function create()
    {
        return view('productos.create');
    }

    public function store(Request $request)
    {
        $datos = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
            'cantidad' => 'required|integer|min:0',
        ]);

        $producto = new Producto();
        $producto->codigo = $datos['codigo'];
        $producto->nombre = $datos['nombre'];
        $producto->precio = $datos['precio'];
        $producto->existencias = $datos['existencias'];
        $producto->cantidad = $datos['cantidad'];

        $producto->save();

        return redirect()->route('productos.index')
            ->with('success', 'Producto creado exitosamente.');
    }
}
