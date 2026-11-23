
@extends('layouts.app')

@section('contenido')

<h1>Editar producto</h1>

<form method="POST" action="{{ route('productos.update', $producto->id) }}">
    @csrf
    @method('PUT')

    <label for="codigo">Código del producto</label>
    <input id="codigo" name="codigo" type="text"
           value="{{ old('codigo', $producto->codigo) }}" required>

    <label for="nombre">Nombre</label>
    <input id="nombre" name="nombre" type="text"
           maxlength="100"
           value="{{ old('nombre', $producto->nombre) }}" required>

    <label for="precio">Precio</label>
    <input id="precio" name="precio" type="number"
           min="0.01" step="0.01"
           value="{{ old('precio', $producto->precio) }}" required>

    <label for="existencias">Existencias</label>
    <input id="existencias" name="existencias" type="number"
           min="0" step="1"
           value="{{ old('existencias', $producto->existencias) }}" required>

    <button type="submit">Actualizar producto</button>

    <a href="{{ route('productos.index') }}">Cancelar</a>
</form>

@endsection
